<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\Messenger;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layouts.app', function ($view) {
            $count = Request::count();
            $reportNotVerifi = Post::where('status_id', 1)->count();
            $reports = Post::paginate(1);
            $user = Auth::user();
            $accounts = Account::paginate(16);
            $view->with([
                'countRequest'=> $count,
                'reportWaiting' => $reportNotVerifi,
                'reports' => $reports,
                'accounts' => $accounts,
                'user' => $user,
            ]);
        });

    }
}
