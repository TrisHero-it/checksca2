<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Models\Category;
use App\Models\News;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;


class NewsController extends Controller
{
    const IMAGE_PATH2 = 'public/news/';
    const IMAGE_PATH = 'public/uploads/news/';
    public function index()
    {
        SEOTools::setTitle('home');
        $news = News::query()->paginate(10);

        return view("admin.news.index", compact("news"));
    }

    public function create()
    {
        $categories = Category::all();

        return view("admin.news.create", compact("categories"));
    }

    public function create2()
    {

        return view("admin.news.create2");
    }

    public function store(Request $request)
    {
        $data = $request->except('image', 'meta', 'category_id', 'key_words');
        if ($request->hasFile("image")) {
            $data['image'] = Storage::put(self::IMAGE_PATH2, $request->file("image"));
        }
        $data['description'] = $request->meta;
        $data['keywords'] = $request->key_words;
        News::create($data);

        return back()->with('success','1');
    }

    public function store2(Request $request) {
        $client = new Client();

        $response = $client->request('GET', $request->link);

        $htmlContent = $response->getBody()->getContents();
        $crawler = new Crawler($htmlContent);
        $title = $crawler->filter('h1.title-news')->each(function ($node) {
            return $node->text();
        });
        $content = $crawler->filter('div.detail-content')->each(function ($node) {
            return $node->outerHtml();
        });

        $detailContent = $crawler->filter('.detail-content');

        $detailContent->filter('.menuquick')->each(function ($node) {
            $node->getNode(0)->parentNode->removeChild($node->getNode(0));
        });
        $detailContent->filter('.ProductListing')->each(function ($node) {
            $node->getNode(0)->parentNode->removeChild($node->getNode(0));
        });

        // Lấy toàn bộ nội dung còn lại dưới dạng text
        $textContent = $detailContent->each(function ($node) {
            return $node->outerHtml(); // Lấy nội dung HTML của class sau khi đã loại bỏ IMG
        });
        $textContent= implode("\n", $textContent);
        $arr = ['content'=>$textContent, 'title'=>$title];
        $response = $client->post("https://minhtri204.app.n8n.cloud/webhook-test/add-news", [
            'form_params' => $arr,
        ]);

        echo 'Vui lòng đợi 5-6p để chuyển đổi văn bản';
    }

    public function delete($id)
    {
        News::find($id)->delete();

        return back()->with('success', '1');
    }

    public function uploadImage(Request $request) {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $image = Storage::put(self::IMAGE_PATH, $file);
            $url = Storage::url($image);
            return response()->json([
                'fileName'=> $image,
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }

    public function edit(int $id ,Request $request) {
        $news = News::query()->findOrFail($id);
        $categories = Category::all();

        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, int $id) {
        $data = $request->except('image', 'meta', 'category_id', 'key_words');
        $data['description'] = $request->meta;
        $data['keywords'] = $request->key_words;
        if ($request->hasFile("image")) {
            $data['image'] = Storage::put(self::IMAGE_PATH2, $request->file("image"));
        }
        $news = News::query()->findOrFail($id);
        $news->update($data);
        return back()->with('success', '1');
    }
}
