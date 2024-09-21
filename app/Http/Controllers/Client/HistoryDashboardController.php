<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\HistoryLogin;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryDashboardController extends Controller
{
    public function index() {
        $reports = Post::where('account_id', Auth::id())->paginate(10);

        return view('dashboard.history.index', compact('reports'));
    }


}
