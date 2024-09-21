<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();

        return view("admin.banks.index", compact("banks"));

    }

    public function create()
    {

        return view("admin.banks.create");
    }

    public function store(StoreBankRequest $request)
    {
        Bank::create([
            'name' => $request->name,
        ]);

        return back()->with('success', '1');

    }

    public function destroy($id)
    {
        Bank::find($id)->delete();

        return back()->with("success", "1");
    }
}
