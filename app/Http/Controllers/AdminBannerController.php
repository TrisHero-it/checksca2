<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();

        return view("admin.banners.index", compact("banners"));
    }

    public function create()
    {

        return view("admin.banners.create");
    }

    public function store(Request $request)
    {
        $file = $request->file('images');
        $pathImages = public_path('images/banner/');
        $fileName = $file->getClientOriginalName();
        $file->move($pathImages, $fileName);
        Banner::create([
            'images' => $fileName,
            'status' => $request->status,
        ]);

        return back()->with("success", "1");
    }

    public function edit($id)
    {
        $banner = Banner::find($id);

        return view("admin.banners.edit", compact("banner"));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $pathImages = public_path('images/banner/');
            $fileName = $file->getClientOriginalName();
            $file->move($pathImages, $fileName);
            Banner::findOrFail($id)->update([
                'status' => $request->status,
                'images' => $fileName
            ]);
        } else {
            Banner::findOrFail($id)->update([
                'status' => $request->status,
            ]);
        }

        return back()->with('success', '1');
    }

    public function destroy($id)
    {
        Banner::find($id)->delete();

        return back()->with("success", "1");
    }


}
