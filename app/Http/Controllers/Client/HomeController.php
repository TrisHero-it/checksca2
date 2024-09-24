<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Community;
use App\Models\Contract;
use App\Models\DetailContract;
use App\Models\News;
use App\Models\Post;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home(Request $request)
    {
        $ads = Ad::take(4)->where('page', 'home')
            ->where('status', 'on')
            ->get();
        $posts = Post::take(10)
            ->orderBy('id', 'desc')
            ->when($request->cate, function ($query) use ($request) {
                return $query->where('category_id', $request->get('cate'));
            })
            ->where('status_id', 3)
            ->where('removed', false)
            ->get();
        $communities = Community::take(12)
            ->orderBy('id', 'desc')
            ->get();

        $news = News::orderBy('id', 'asc')
            ->take(4)
            ->where('status', 2)
            ->Get();

        $contacts = Contract::get();

        $categories = Category::get();

        $detailContracts = DetailContract::take(7)->orderByDesc('id')->get();

        $traders = Trader::get();


        return view('home', compact('posts', 'communities', 'news', 'contacts', 'detailContracts', 'ads', 'categories', 'traders'));
    }
}
