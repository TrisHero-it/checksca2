<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\DetailContract;
use App\Models\Messenger;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function index()
    {
        $messages = DetailContract::orderBy("created_at", "desc")->paginate(10);

        return view("admin.messengers.index", compact('messages'));
    }

    public function show(Request $request, $id)
    {
        $contract = DetailContract::findOrFail($id);

        Messenger::where('detail_contract_id', $id)->update([
            'seen' => 1,
        ]);

        $mess = Messenger::where('account_id', $contract->account_id)
            ->orderByDesc('id')
            ->take($request->offset ?? 15)->get();
        $mess = $mess->sortBy('created_at');

        return view('admin.messengers.show', compact('contract', 'mess'));
    }

    public function update(int $id, Request $request)
    {
        $update = DetailContract::where('id', $id)->update([
            'status' => $request->status,
        ]);

        return response()->json($update);
    }
}
