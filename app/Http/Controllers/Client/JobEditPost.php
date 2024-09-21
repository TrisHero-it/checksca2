<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobEditPost extends Controller
{
    const IMAGE_PATH = 'public/posts';
    public function store (Request $request)
    {
        $data = $request->except('delete_old_images', 'new_images');
        $data['account_id'] = Auth::id();
        $data['status'] = 0;
        $arrOldImages = explode(',', $request->delete_old_images);
        $newArrOldImages = [];
        $newArrImages = [];
        foreach ($arrOldImages as $image) {
            $nameImage = explode('/', $image);
            $nameImage = self::IMAGE_PATH . '/' . end($nameImage);
            $newArrOldImages[] = $nameImage;
        }
        $data['delete_old_images'] = $newArrOldImages;
        if ($request->hasFile('new_images')) {
          foreach ($request->new_images as $image) {
              $newImage = Storage::put(self::IMAGE_PATH, $image);
              $newArrImages[] = $newImage;
          }
        }
        $data['new_images'] = $newArrImages;
        \App\Models\JobEditPost::create($data);

        return redirect()->route('dashboard.histories')->with('success', 1);
    }
}
