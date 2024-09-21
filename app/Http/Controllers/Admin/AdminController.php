<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Notification;
use App\Models\Trader;
use App\Models\Viewer;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AdminReportsRequest;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    const IMAGE_PATH = 'public/posts' ;
    public function index(Request $request)
    {
        $data = $request->except('page');
        $reports = Post::where($data)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        if (isset($request->page)) {
            if ($request->page > (ceil($reports->total() / $reports->perPage()) + 1)) {
                abort(404);
            }
        }
        $reportNotVerifi = Post::where('status_id', 1)->count();

        return view(
            "admin.reports.index",
            [
                'reports' => $reports,
                'reportNotVerifi' => $reportNotVerifi
            ]
        );
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $client = new Client();
        $response = $client->request('get', 'https://api.vietqr.io/v2/banks');
        $body = $response->getBody()->getContents();
        $banks = json_decode($body, true);
        $banks = $banks['data'];

        return view('admin.reports.create', compact('categories', 'banks'));
    }

    public function update($id, Request $request)
    {
        Post::where('id', $id)
            ->update([
                'status_id' => $request->status_id
            ]);

        return response()->json(['success', 1]);
    }

    public function destroy($id, Request $request)
    {
        Post::where('id', $id)->delete();
        if (str::contains($request->fullUrl(), 'admin-reports')) {

            return redirect('/admin-reports');
        }

        return back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::query()->where('post_id', $id)
            ->where('comment_id', null)
            ->get();

        return view('admin.reports.show', compact('post', 'comments'));
    }
   public function store(Request $request)
    {
        $arrImg  = [];
        $data = $request->except('_token', 'images');
        $data['status_id'] = 3;
        $data['account_id'] = Auth::id();
        foreach ($request->images as $image) {
            $arrImg[] = Storage::put(self::IMAGE_PATH, $image);
        }
        $data['images'] = $arrImg;
        $post =  Post::create($data);

        return back()->with('success', '1');
    }

    public function delete($id)
    {
        Comment::where('id', $id)->delete();

        return back()->with('success', '1');
    }
}
