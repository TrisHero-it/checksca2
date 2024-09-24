<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    const IMAGE_PATH = 'public/muakeys';
    public function index()
    {
        $ads = Ad::query()->where('page' , 'home')->get();
        $checkAdsHome =  Ad::query()->where('page' , 'home')->first();

        $newsAd = Ad::query()->where('page' , 'news')->first();

        return view('admin.ads.index', compact('ads', 'newsAd', 'checkAdsHome'))   ;
    }

    public function edit($id) {
        $ad = Ad::query()->findOrFail($id);

        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, $id) {
        $ad = Ad::query()->findOrFail($id);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put(self::IMAGE_PATH, $request->file('image'));
            Storage::delete($ad->image);
        }
        $ad->update($data);

        return back()->with('success', 1);
    }

    public function updateStatus(Request $request, string $page){
        try {
            $ads = Ad::query()->where('page' , $page)->update([
                'status' => $request->status
            ]);

            return response()->json([
                'success' => true,
            ]);
        }catch (\Exception $exception){

            return response()->json([
                'error' => true,
            ]);
        }
    }

}
