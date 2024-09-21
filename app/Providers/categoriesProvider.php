<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class categoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            if (auth()->check())
            {
                $email = auth()->user()->email;
            }else {
               $email = 'asdasdas';
            }
            $cates = Category::get();
            $view->with([
                'categories'=> $cates,
                'email'=> $email
            ]);
        });

        View::composer('report.create', function ($view) {
            $cates = Category::get();
            $view->with('cates', $cates);
        });
    }
}
