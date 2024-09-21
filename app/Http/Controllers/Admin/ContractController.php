<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{
    const IMAGE_PATH = 'public/contracts/';
    public function index()
    {
        $contracts = Contract::all();

        return view("admin.contracts.index", compact("contracts"));
    }

    public function edit($id)
    {
        $contract = Contract::findOrFail($id);

        return view("admin.contracts.edit", compact("contract"));
    }

    public function update(UpdateContractRequest $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $data = $request->except('image', 'color');
        if ($request->hasFile('image')){
            Storage::delete($contract->image);
            $img = Storage::put(self::IMAGE_PATH, $request->image);
            $data['image'] = $img;
        }
        $contract->update($data);

        return back()->with('success', '1');
    }

    public function destroy($id)
    {
        Contract::findOrFail($id)->delete();

        return back()->with("success", "1");
    }
}
