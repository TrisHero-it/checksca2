<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTrader;
use Goutte\Client;
use App\Models\Account;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Trader;
use App\Models\TradersCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminTraderController extends Controller
{
    const IMAGE_PATH_ACCOUNT = 'public/accounts/';
    const IMAGE_PATH_TRADER = 'public/traders/';
    public function index(Request $request)
    {
        $traders = Trader::paginate(8);
        if (isset($request->page)) {
            if ($request->page >= (ceil($traders->total() / $traders->perPage()) + 1)) {
                abort(404);
            }
        }

        return view("admin.traders.index", compact("traders"));
    }

    public function create()
    {
        $categories = Category::all();
        $contracts = Contract::all();

        return view('admin.traders.create', compact('categories', 'contracts'));
    }

    public function store(StoreTrader $request)
    {
        $arrCate = explode(',', $request->category_id);
        $email = $request->email;
        $account = Account::query()->where('email', $email)->first();
        if (!isset($account)) {
            $account = Account::query()->create([
                'email' => $email,
                'password' => Hash::make($request->password),
                'name' => $request->fullname,
                'avatar' => Storage::put(self::IMAGE_PATH_ACCOUNT, $request->img),
            ]);
        }

        $data = $request->except('email','password', 'category_id', 'img');
        $data['account_id'] = $account->id;
        $data['img'] = Storage::put(self::IMAGE_PATH_TRADER, $request->img);

        $client = new Client();
        $crawler = $client->request('GET', $request->link_facebook);
        $groupName = $crawler->filter('meta[property="og:title"]')->attr('content');
        $arrName = explode("|", $groupName);
        $groupName = $arrName[0];
        $data['is_Admin_Facebook'] = $groupName;
        $trader = Trader::query()->create($data);

        foreach ($arrCate as $cate) {
            TradersCategories::query()->create([
               'trader_id' => $trader->id,
                'category_id' => $cate
            ]);
        }

        return back()->with('success', '1');
    }

    public function show(Request $request, $id)
    {
        $trader = Trader::findOrFail($id);
        $categories = TradersCategories::query()->where('trader_id', $id)->get();

        return view('admin.traders.show', compact('trader', 'categories'));
    }
    public function destroy(Request $request, $id)
    {
        $trader = Trader::findOrFail($id);
        $trader->delete();
    }

    public function update(Request $request, $id)
    {
        $trader = Trader::findOrFail($id);
        $newTrader = \App\Models\Request::where('trader_id', $id)->first();
        $data = [];
        if ($newTrader->zalo!=null){
            $data = array_merge($data, ['zalo'=> $newTrader->zalo]);
        } if ($newTrader->facebook!=null){
            $data = array_merge($data, ['facebook'=> $newTrader->facebook]);
        } if ($newTrader->website!=null){
            $data = array_merge($data, ['website'=> $newTrader->website]);
        } if ($newTrader->describe!=null){
            $data = array_merge($data, ['describe'=> $newTrader->describe]);
        } if ($newTrader->img!=null){
            $data = array_merge($data, ['img'=> $newTrader->img]);
        } if ($newTrader->fullname!=null){
            $data = array_merge($data, ['fullname'=> $newTrader->fullname]);
        } if ($newTrader->bank!=null){
            $data = array_merge($data, ['bank'=> $newTrader->bank]);
        } if ($newTrader->fee!=null){
            $data = array_merge($data, ['fee'=> $newTrader->fee]);
        }
        $trader->update($data);
        $newTrader->delete();
    }
}
