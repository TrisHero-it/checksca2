<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function index()
    {
        $posters = Poster::orderBy("created_at", "desc")->paginate(10);

        return view("admin.posters.index", compact("posters"));
    }

    public function edit($id)
    {
        $poster = Poster::findOrFail($id);

        return view("admin.posters.edit", compact("poster"));
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('image');
        $pathImages = public_path('images/posters/');
        $fileName = $file->getClientOriginalName();
        $file->move($pathImages, $fileName);
        $poster = Poster::findOrFail($id);
        $poster->update([
            'image' => $fileName
        ]);

        return back()->with("success", "1");
    }

}
