<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PartsCategories;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.nav', function($view) {
            $view->with('parts_categories', PartsCategories::with('children')->where('parent', 0)->orderBy('name', 'asc')->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
