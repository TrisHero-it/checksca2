<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\DetailContract;
use App\Models\Messenger;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MidmanController extends Controller
{
    public function index(Request $request) {
        if (isset($request->search)){
            $midmans = DetailContract::query()
                ->where('name', 'like', '%'.$request->search.'%')
                ->orWhereRaw("MATCH(name) AGAINST('$request->search' IN NATURAL LANGUAGE MODE)")
                ->orderBy('id', 'desc')->paginate(16);
        }else {
            $midmans = DetailContract::query()->orderBy('id', 'desc')->paginate(16);
        }

        $news = News::query()->take(4)->latest()->get();
        return view('midman.index', compact('midmans', 'news'));
    }

    public function show($id) {
            $account = Account::query()->where('id', Auth::id())->firstOrFail();
            $midroom = DetailContract::query()->where('id', $id)->firstOrFail();
            $buyer = $midroom->infor_buyer;
            $seller = $midroom->infor_seller;
            if ($account['email']==$buyer['email'] || $account['email']==$seller['email'] || Auth::user()->role_id ==2) {
                $midRoom = \App\Models\DetailContract::query()->findOrFail($id);
                $messengers = Messenger::query()->where('detail_contract_id', $midRoom->id)->get();
                return view('midrooms.layouts.app', compact('midRoom', 'messengers'));
            }else {
                return view('midman.error');
            }
    }

    public function checkPass(Request $request, $id) {
        $midman = DetailContract::findOrFail($id);
        $account = Auth::user();
        if ($account->role_id ==2)
        {
            return response()->json(['success' => 1]);
        } else {
            $buyer =$midman->infor_buyer;
            $seller =$midman->infor_seller;
            if ($account->email == $seller['email'] || $account->email== $buyer['email']) {
                return response()->json(['success' => 1]);
            }else {
                return response()->json(['error' => 1]);
            }
        }
    }

    public function store (Request $request, int $id) {
        $midroom = DetailContract::query()->findOrFail($id);
        if ($request->security_code == $midroom->security_code) {

            return response()->json(['success' => 1]);
        }else {

            return response()->json(['error' => 1]);
        }
}

    public function search(Request $request)
    {
        $query = $request->search;
        $midrooms = DetailContract::whereRaw("MATCH(name) AGAINST('$query' IN NATURAL LANGUAGE MODE)")
            ->OrWhere('fullname', "LIKE", "$query%")
            ->get();

        return response()->json($midrooms);
    }

}
