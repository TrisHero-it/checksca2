<?php

namespace App\Http\Controllers;

use App\Mail\VeryfiEmailSignUp;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SignUpController extends Controller
{
    public function create(Request $request, $code)
    {

        $acc = Account::query()->where('verify_code', $code)->firstOrFail();
        if ($acc->uid != null) {
            $acc->update([
                'verify_code' => null
            ]);
            return redirect('/')->with('login', '1');
        }
        $flag =0;
        $accounts = Account::query()->get();
        foreach ($accounts as $account) {
            if ($account->verify_code == $code) {
                $flag = 1;
                break;
            }
        }
        if ($flag == 0) {
            abort(404);
        }else {
            return view('sign-up.create');
        }
    }

    public function store(Request $request, $code) {
            $account = Account::query()->where('verify_code',$code)->firstOrFail();
            $account->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'avatar' => 'https://graph.facebook.com/v3.3/753383010325459/picture',
                'verify_code' => null,
                'numberphone'=> $request->number_phone
            ]);
            return redirect('/')->with('sign-up-success', '1');
    }

    public function verifyEmail(Request $request)
    {
        $code = mt_rand('100000', '999999');
        $link = env('APP_URL').'/sign-up/'.$code;
        Account::create([
            'verify_code' => $code,
            'email' => $request->email,
        ]);
        Mail::to($request->email)->send(new VeryfiEmailSignUp($link));
        return back()->with('sign-up', '1');
    }
}
