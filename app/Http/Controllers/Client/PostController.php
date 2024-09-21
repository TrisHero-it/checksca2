<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Jobs\CheckViewer;
use App\Models\Account;
use App\Models\Comment;
use App\Models\Community;
use App\Models\News;
use App\Models\Post;
use App\Models\notification;
use App\Models\Poster;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    const PATH_IMAGE = 'public/posts/';
    public function create()
    {
        $client = new Client();
        $account = Account::where('id', Auth::id())->get();
        $posters = Poster::all();
        $response = $client->request('get', 'https://api.vietqr.io/v2/banks');
        $body = $response->getBody()->getContents();
        $banks = json_decode($body, true);
        $banks = $banks['data'];
        return view('report.create', compact('account', 'posters', 'banks'));
    }

    public function store(ReportRequest $request)
    {
        $arrImage = [];
        $files = $request->file('image');
        $variable = ['png', 'jpeg', 'jpg', 'gif', 'svg'];
        $pathImages = public_path('images/posts/');
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $arr = explode('.', $fileName);
            foreach ($variable as $value) {
                if (end($arr) == $value) {
                    $flag = 1;
                    $move = Storage::put('public/posts', $file);
                    $arrImage[] = $move;
                    break;
                }
            }
        }
        if (!isset($flag)) {
            return back()->with('error', 'Hình ảnh sai định dạng');
        }
            $post = Post::create([
            'images' => $arrImage,
            'category_id' => $request->danhmuc,
            'username' => $request->username,
            'uid' => $request->uid,
            'linkfb' => $request->link ? $request->link : NULL,
            'fullname' => $request->hovaten,
            'numberphone' => $request->sodienthoai,
            'numberbank' => $request->sotaikhoan,
            'namebank' => $request->nganhang,
            'content' => $request->noidung,
            'status' => $request->status,
            'account_id' => Auth::id(),
            'moneys_scam' => $request->scam
        ]);

        return back()->with('success', '1');
    }

    public function show(int $id, Request $request)
    {
        $post = Post::findOrFail($id);
        $communities = Community::all();
        if (Auth::check()) {
            $account = Account::where('id', Auth::id())->first();
        } else {
            $account = ['numcomments' => 3];
        }
        $data = [
            'device' => $request->header('Sec-Ch-Ua-Mobile') == '?0' ? "Computer" : "Mobile",
            'platform' => $request->header('Sec-Ch-Ua-Platform'),
        ];
        if ($post->status_id != 3) {
            if (Auth::user()->role_id == 2) {
                return view('report.show', compact('post', 'account'));
            } else {
                abort(404);
            }
        }

        $posters = Poster::all();
        $comments = Comment::query()->where('post_id', $id)->where('comment_id', null)->orderBy('id', 'desc')->get();
        CheckViewer::dispatch($data, $id);
        return view('report.show', compact('post', 'account', 'posters', 'communities', 'comments'));
    }

    public function update(Request $request, int $id) {
        $post = Post::query()->findOrFail($id);
        $data = $request->except('delete_old_images', 'new_images', 'account_id');
        $arrOldImage = explode(',', $request->delete_old_images);
        foreach ($arrOldImage as $image) {
            $arrImg = explode('/', $image);
            $img  = end($arrImg);
            Storage::delete(self::PATH_IMAGE.$img);
            $key = array_search(self::PATH_IMAGE.$img, $post->images);
            $arr = $post->images;
            unset($arr[$key]);
            $post->update([
                'images' => $arr
            ]);
        }
        $arrImage = $post->images;
        if (isset($request->new_images)) {
            foreach ($request->new_images as $image) {
                $image = Storage::put(self::PATH_IMAGE, $image);
                $arrImage[] = $image;
            }
            $data['images'] = $arrImage;
        }

        $data['account_id'] = Auth::id();
        $post->update($data);

//        return redirect()->route('dashboard.histories');
        return back()->with('success', '2');
    }

    public function index(Request $request)
    {
        if (isset($request->search) || isset($request->cate)) {
            if (isset($request->search)) {
               $posts = Post::searchPost($request->search);
            } else if (isset($request->cate)) {
                $posts = Post::where('category_id', $request->cate)
                    ->where('status_id', 3)
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            } else {
                $posts = Post::where('category_id', $request->cate)
                    ->whereRaw("MATCH(fullname) AGAINST('$request->search' IN NATURAL LANGUAGE MODE)")
                    ->orWhereRaw("MATCH(numberphone) AGAINST('$request->search*' IN BOOLEAN MODE)")
                    ->where('status_id', 3)
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            }
        } else {
            $posts = Post::orderBy('id', 'desc')
                ->where('status_id', 3)
                ->paginate(10);
        }
        $news = News::take(4)->get();

        return view('report.index', compact('posts', 'news'));
    }

    public function loadMore(Request $request)
    {

        $offset = $request->offset;
        if ($request->screen <= 500) {
            $post = 7;
        } else {
            $post = 13;
        }
        if (isset($request->search) && $request->search != null) {
            $posts = Post::skip($post - 1)
                ->take($post)
                ->where('fullname', 'Nguyễn Minh Trí')
                ->where('status_id', 3)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $posts = Post::skip($offset)
                ->orderBy('id', 'desc')
                ->where('status_id', 3)
                ->take($post)
                ->get();
        }
        foreach ($posts as $post) {
            $post = $posts->map(function ($post) {
                $post->views = $post->views($post->id);
                return $post;
            });
        }

        return response()->json($posts);
    }

    public function destroy($id) {
        $post = Post::query()->findOrFail($id);
        if ($post->account_id == Auth::id() || Auth::user()->role_id == 2) {
            $post->delete();
            return back()->with('success', '1');
        }else {
            abort(404);
        }
    }

    public function search(Request $request)
    {
        $query = $request->search;
        $posts = Post::whereRaw("MATCH(fullname) AGAINST('$query' IN NATURAL LANGUAGE MODE)")
            ->orWhereRaw("MATCH(numberphone) AGAINST('$query*' IN BOOLEAN MODE)")
            ->OrWhere('fullname', "LIKE", "$query%")
            ->get();


        return response()->json($posts);
    }
}


