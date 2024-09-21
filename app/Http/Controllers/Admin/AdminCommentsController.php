<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->popular)) {
            if ($request->popular == 'oldest') {
                $comments = Comment::orderBy("id", "asc")
                    ->when($request->post, function ($query) use ($request) {
                        return $query->where("post_id", $request->post);
                    })
                    ->paginate(10);
            } else {
                $comments = Comment::withCount("likes")->orderBy('likes_count', 'desc')
                    ->when($request->post, function ($query) use ($request) {
                        return $query->where("post_id", $request->post);
                    })
                    ->paginate(10);
            }
        } else {
            $comments = Comment::orderBy("id", "desc")
                ->when($request->post, function ($query) use ($request) {
                    return $query->where("post_id", $request->post);
                })
                ->paginate(10);
        }

        if (isset($request->page)) {
            if ($request->page > (ceil($comments->total() / 10))) {
                if (ceil($comments->total() / 10) != 0 || ($request->page != 1 && ceil($comments->total() / 10) == 0)) {
                    abort(404);
                }
            }
        }

        $posts = Post::where('status_id', 3)
        ->orderBy("id", "desc")->get("id");

        return view("admin.comments.index", compact("comments", 'posts'));
    }
}
