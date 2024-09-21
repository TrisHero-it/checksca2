<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\HistoryLogin;
use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashController extends Controller
{
    const IMAGE_PATH = 'public/dashboard/';
    public function index() {
        $account = Account::query()->findOrFail(Auth::id());

        return view('dashboard.index', compact('account'));
    }

    public function edit(Request $request) {
        $account = Account::query()->findOrFail(Auth::id());
        $histories = HistoryLogin::query()->where('account_id', Auth::id())->paginate(10);

        return view('dashboard.edit', compact('account', 'histories'));
    }

    public function editProfile(Request $request) {
        $account = Account::query()->findOrFail(Auth::id());

        return view('dashboard.edit-profile', compact('account'));
    }

    public function editReport (Request $request, $id) {
        $post = Post::query()->findOrFail($id);
        if ($post->account_id != Auth::id() || $post->status_id == 3){
            abort(404);
        }
        $cates = Category::all();
        $client = new Client();
        $response = $client->request('get', 'https://api.vietqr.io/v2/banks');
        $body = $response->getBody()->getContents();
        $banks = json_decode($body, true);
        $banks = $banks['data'];
        $account = Auth::user();

        return view('dashboard.history.edit', compact('post', 'cates', 'banks' , 'account'));
    }

    public function updateAvatar(Request $request) {
        $account = Account::query()->findOrFail(Auth::id());
        $avatar = Storage::put(self::IMAGE_PATH, $request->file('avatar'));
        $account->update([
            'avatar' => $avatar
        ]);

        return redirect()->back();
    }

}
