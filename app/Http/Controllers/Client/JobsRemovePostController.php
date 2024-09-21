<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\JobRemovePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobsRemovePostController extends Controller
{
    const IMAGE_PATH = 'public/jobs-remove-post/';
    public function index() {
            $posts = JobRemovePost::all();

        return view('admin.request-remove-post.index', compact('posts'));
    }

    public function store(Request $request) {
        $data = $request->except('number', 'images');
        $data['account_id']= Auth::id();
        $data['post_id'] = $request->number;
        $arrImage = [];
        if (isset($request->images)) {
            foreach ($request->images as $image) {
                if ($image != null) {
                    $arrImage[] = Storage::put(self::IMAGE_PATH, $image);
                }
            }
        }
        $data['images'] = $arrImage;
        $post = Post::query()->findOrFail($request->number);
        if ($post->account_id != Auth::id() && $request->content == null) {
            abort(403);
        }else{
            $a = JobRemovePost::query()->where('account_id', Auth::id())
            ->where('post_id', $data['post_id'])->first();
            if (!isset($a)) {
                JobRemovePost::create($data);
            }else {
                abort(404);
            }
        }

        return back()->with('success', 1);
    }

    public function update(Request $request, $id) {
        $job = JobRemovePost::query()->where('post_id', $id)->first();
       if ($request->status == 1 ) {
           $job->update([
               'status' => $request->status
           ]);
       }else {
           $job->update([
               'status' => $request->status
           ]);
           $post = Post::query()->findOrFail($id);
           $post->update([
               'removed' => true
           ]);
       }

    }
}
