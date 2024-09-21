<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Jobs\StoreHistoryLogin;
use App\Mail\VeryfiEmailSignUp;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function store(StoreLoginRequest $request) {
        if (!isset($request->duytridangnhap)) {
            Auth::attempt([
                'email'=> $request->email,
                'password' => $request->password,
                'uid' => null,
                'google_id' => null,
            ]);
        }   else {
            Auth::attempt([
                'email'=> $request->email,
                'password' => $request->password,
                'uid' => null,
                'google_id' => null,
            ], $remember = true);
        }
        if(Auth::check()) {
            if (Auth::user()->ban == 1) {
                Auth::logout();
                return redirect('/')->with('ban', '1');
            }
        }

        StoreHistoryLogin::dispatch(Auth::id(), $request->header('User-Agent'));

        if (Auth::check()){
            return back()->with('login', '1');
        }else {
            return back()->with('error', '1');
        }
    }
    public function loginWithGoogle(Request $request)
    {
        session(['url' => url()->previous()]);
        return Socialite::driver('google')->redirect();
    }

    public function callBackGoogle(Request $request)
    {
        $url = session('url');
        $user = Socialite::driver('google')->user();
        dd($user);
        $findUser = Account::where('email', $user->email)->first();
        if ($findUser) {
            Auth::attempt([
                'email' => "$user->email",
                'password' => 1,
            ]);
            if (Auth::user()->ban == 1) {
                Auth::logout();
                return redirect($url)->with('ban', '1');
            }
            Account::where('email', $user->email)->update([
                'name' => $user->name,
                'avatar' => $user->avatar,
            ]);
            return redirect($url)->with('login', '1');
        } else {
            Account::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'avatar' => $user->avatar,
            ]);
        }
        return redirect($url)->with('login', '1');
    }

    public function loginWithFacebook(Request $request)
    {
        session(['url' => url()->previous()]);

        return Socialite::driver('facebook')->redirect();
    }

    public function loginCallBack(Request $request)
    {
        $url = session('url');
        $user = Socialite::driver('facebook')->user();
        $authUser = $this->findOrCreateAccount($user);
        Auth::attempt([
            'email' => "$authUser->email",
            'password' => 1,
            'uid' => $authUser->uid,
        ], $remember = true);
       if (Auth::check()) {
           if (Auth::user()->ban == 1) {
               Auth::logout();
               return redirect($url)->with('ban', '1');
           }
       }
        return redirect($url)->with('login', '1');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }

    public function sendEmail(Request $request) {
        $code = mt_rand('100000', '999999');
        $link = env('APP_URL').'/sign-up/'.$code;
        Mail::to($request->email)->send(new VeryfiEmailSignUp($link));
        $account = Auth::user();
        $account->update([
            'email'=> $request->email,
            'verify_code' => $code,
        ]);
        return back()->with('sign-up', '1');
    }

    protected function findOrCreateAccount($facebookUser)
    {
        $user = Account::where('uid', $facebookUser->id)->first();

        if (!$user) {
            $user = Account::create([
                'name' => $facebookUser->name,
                'uid' => $facebookUser->id,
                'avatar' => $facebookUser->avatar,
            ]);
            $user->update([
                'email' => $facebookUser->email?? 'checksca_khong_co_email_'.$user->id,
            ]);

        } else {
            Account::where(
                'uid',
                $facebookUser->id
            )
                ->update([
                    'name' => $facebookUser->name,
                    'avatar' => $facebookUser->avatar,
                ]);
        }

        return $user;
    }

    public function editPassword() {

        return view('dashboard.password.change');
    }

    public function updatePassword(Request $request) {
        $account = Auth::user();

        if ($account->password == $request->oldPass){
            if ($request->password == $request->rePass){
             if ($account->changed_at == null){
                 $account->update([
                     'password' => \Illuminate\Support\Facades\Hash::make($request->password),
                     'changed_at' => now()
                 ]);
             }else {
                 $date = $account->changed_at;
                 $date = new \DateTime($date);
                 $date = $date->diff(now())->format('%a');
                 $int = (int)$date;
                 if ($int > 60){
                     $account->update([
                         'password' => \Illuminate\Support\Facades\Hash::make($request->password),
                         'changed_at' => now()
                     ]);
                 }
             }
            }
        }else {
            return back()->with('errorOldPassword', 1);
        }
    }
}
