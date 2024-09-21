<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\Community;
use Http;
use Illuminate\Http\Request;

class ComunityController extends Controller
{
    public function index(Request $request)
    {
        $communities = Community::paginate(5);
        if (isset($request->page)) {
            if ($request->page >= (ceil($communities->total() / $communities->perPage()) + 1)) {
                abort(404);
            }
        }

        return view("admin.communities.index", compact("communities"));
    }

    public function destroy($id)
    {
        $community = Community::findOrFail($id)->delete();

        return back()->with("success", "1");
    }

    public function create(Request $request)
    {

        return view("admin.communities.create");
    }

    public function store(StoreComunityRequest $request)
    {
        $file = $request->file("image");
        $pathImages = public_path('images/communities/');
        $fileName = $file->getClientOriginalName();
        $file->move($pathImages, $fileName);
        Community::create([
            'name' => $request->name,
            'infor' => $request->infor,
            'image' => $fileName,
            'link' => $request->link,
        ]);

        return back()->with("success", "1");
    }

    public function edit($id)
    {
        $community = Community::findOrFail($id);

        return view("admin.communities.edit", compact("community"));
    }

    public function update(UpdateCommunityRequest $request, $id)
    {
        $community = Community::findOrFail($id);
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $pathImages = public_path('images/communities/');
            $fileName = $file->getClientOriginalName();
            $file->move($pathImages, $fileName);
            $community->update([
                'name' => $request->name,
                'infor' => $request->infor,
                'image' => $fileName,
                'link' => $request->link,
            ]);
        } else {
            $community->update([
                'name' => $request->name,
                'infor' => $request->infor,
                'link' => $request->link,
            ]);
        }

        return back()->with("success", "1");
    }
}
