<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Account;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        if (Auth::user()->numcomments <=0) {
            return response()-> json(['error'=> 'Hết số lần comment']);
        }
        Comment::create([
            'account_id' => Auth::id(),
            'comment_id' => $request->reply ? $request->reply : NULL,
            'post_id' => $request->post,
            'comment_content' => $request->comment
        ]);
        $comment = Account::where('id', Auth::id())->first();
        $comment->update([
            'numcomments' => Auth::user()->numcomments - 1,
        ]);

        return back();
    }

    public function like(int $id)
    {
        $comment = Comment::findOrFail($id);
        Like::create([
            'account_id' => Auth::id(),
            'post_id' => $comment->post_id,
            'comment_id' => $id
        ]);

        return "like";
    }

    public function unlike(int $id)
    {
        $comment = Comment::findOrFail($id);

        Like::where('comment_id', $comment->id)
            ->where('account_id', Auth::id())
            ->delete();
    }
}
