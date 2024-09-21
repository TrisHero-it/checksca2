<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Community;
use App\Models\News;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy("created_at", "desc")->take(5)->get();

        $newsLastWeek = News::orderBy("created_at", "desc")->take(3)->get();
        $categories = Category::get();
        $ad = Ad::where('page', 'news')->first();

        return view("news.index", compact('news', 'categories', 'newsLastWeek', 'ad'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $arrKeywords = explode(",", $news->keywords);
        SEOTools::setTitle($news->title);
        SEOMeta::setDescription($news->description);
        SEOMeta::setCanonical(request()->url());
        SEOMeta::setKeywords($arrKeywords);

        OpenGraph::setTitle($news->title);
        OpenGraph::setDescription($news->description);
        OpenGraph::setUrl(request()->url());
        OpenGraph::addImage(Storage::url($news->image));

        $news->update(['viewers' => $news->viewers + 1]);
        $OtherNews = News::query()->take(5)->get();
        $communities = Community::take(5)->get();

        return view('news.show', compact('news', 'OtherNews', 'communities'));
    }

     public function loadMore(Request $request)
    {
        $news = News::skip($request->offset)
            ->orderBy("created_at", "desc")
            ->take(8)->get();

        return response()->json($news);
    }
}
