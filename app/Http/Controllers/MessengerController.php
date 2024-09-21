<?php

namespace App\Http\Controllers;

use App\Events\chatEvent;
use App\Models\Account;
use App\Models\Messenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    public function loadMore(Request $request)
    {
        $mess = Messenger::where('account_id', $request->account)
            ->skip($request->offset)
            ->take(10)
            ->orderByDesc('id')
            ->get();

        return response()->json($mess);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            $data['account_id'] = Auth::id();
            Messenger::create($data);
            $data['old_message'] = Messenger::query()->select('account_id')->where('detail_contract_id', $data['detail_contract_id'])->take(1)->latest()->first();
            if ($data['old_message']->account_id == Auth::id()) {
                $data['account_send_message']= Account::query()->select('avatar', 'name')->where('id', \auth()->id())->first();
            }else {
                $data['account_send_message']= Account::query()->select('avatar', 'name')->where('id', $data['old_message']->account_id)->first();
            }
            event(new chatEvent($data));
            return $data;
        }catch (\Exception $exception){
            return response()->json(['error', 'đã xảy ra lỗi']);
        }

    }

    public function getMessengers($id) {
        $mess = Messenger::query()->where('detail_contract_id', $id)->latest()->first();
        return response()->json($mess);
    }

}
