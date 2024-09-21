<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use Illuminate\Http\Request;

class TraderController extends Controller
{
  public function index(Request $request)
  {
    $cate = $request->cate;
    $search = $request->search;

    if ($search != null) {
        if ($cate != null){
            $traders = Trader::query()->take(12)->whereHas('categories', function($query) use ($cate) {
                $query->where('categories.id', $cate);
            })->whereRaw("MATCH(fullname) AGAINST('$search' IN NATURAL LANGUAGE MODE)")
                ->paginate(12);
        }else {
            $traders = Trader::query()->whereRaw("MATCH(fullname) AGAINST('$search' IN NATURAL LANGUAGE MODE)")
                ->paginate(12);
        }
    }else {
        if ($cate != null){
            $traders = Trader::query()->take(12)->whereHas('categories', function($query) use ($cate) {
                $query->where('categories.id', $cate);
            })->get();
        }else {
            $traders = Trader::query()->take(12)->get();
        }
    }


      return view('trader.index', compact('traders'));
  }

  public function show(int $id)
  {
    $trader = Trader::where('id', $id)->FirstOrFail();
    $check = \App\Models\Request::where('trader_id', $id)->first();

    return view('trader.show', compact('trader', 'check'));
  }

  public function loadMore(Request $request)
  {
    $offset = $request->offset;

    $posts = Trader::skip($offset)
      ->orderBy('id', 'desc')
      ->take(7)
      ->get();

    return response()->json($posts);
  }

  public function update(Request $request, $id)
  {
    $trader = Trader::findOrFail($id);
    $data = $request->except('_token', '_method');
    $check = \App\Models\Request::where('trader_id', $id)->first();
    if (empty($check)) {
      $data = array_merge($data, ['trader_id' => $trader->id]);
      \App\Models\Request::create($data);
    }

    return back() ->with('success', '1');
  }

  public function search(Request $request)
  {
    $query = $request->search;
    $posts = Trader::whereRaw("MATCH(fullname) AGAINST('$query' IN NATURAL LANGUAGE MODE)")
      ->orWhereRaw("MATCH(zalo) AGAINST('$query*' IN BOOLEAN MODE)")
      ->get();

    return response()->json($posts);
  }

}
