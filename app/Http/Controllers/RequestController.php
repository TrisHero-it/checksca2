<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $traders = \App\Models\Request::orderByDesc("id")->paginate(10);
        return view("admin.traders.index-request", compact('traders'));
    }

    public function destroy($id)
    {
        $request = \App\Models\Request::where('trader_id', $id)->first();
        $request->delete();
    }
}
