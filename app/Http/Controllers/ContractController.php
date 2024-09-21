<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function show($id)
    {
        $contracts = Contract::all();
        $detail = Contract::findOrFail($id);
        return view('contract.show', compact('contracts', 'detail'));
    }
}
