<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDetailContractRequest;
use App\Models\Category;
use App\Models\Contract;
use App\Models\DetailContract;
use App\Models\Messenger;
use Auth;
use Illuminate\Http\Request;

class DetailContractController extends Controller
{
    public function index(Request $request)
    {
        $contracts = DetailContract::orderByDesc("id")->get();

        return view("detail-contracts.index", compact("contracts"));
    }

    public function store(StoreDetailContractRequest $request)
    {
        $buyer = ['name' => $request->name_buyer, 'email' => $request->email_buyer];
        $seller = ['name' => $request->name_seller, 'email' => $request->email_seller];
        $detailContract = DetailContract::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'moneys' => $request->moneys,
            'infor_buyer' => $buyer,
            'infor_seller' => $seller,
            'status' => '0',
            'stage' => '0',
            'trader_id'=> $request->midman ,
            'security_code' => rand(1000000, 9999999),
            'account_id' => Auth::id(),
        ]);


        return back()->with("success", "1");
    }

    public function myContract(Request $request)
    {
        $myContracts = DetailContract::where("account_id", Auth::id())->get();
        $categories = Category::orderBy("id", "desc")->get();

        return view("detail-contracts.my-contracts", compact("myContracts", 'categories'));
    }

    public function show($id, Request $request)
    {
        $contract = DetailContract::findOrFail($id);

        $mess = Messenger::where('detail_contract_id', $id)
            ->orderByDesc('id')
            ->take(15)->get();
        $mess = $mess->sortBy('created_at');

        return view('detail-contracts.show', compact('contract', 'mess'));
    }

    public function destroy($id)
    {
        $detailContract = DetailContract::findOrFail($id);
        $detailContract->delete();
    }
}
