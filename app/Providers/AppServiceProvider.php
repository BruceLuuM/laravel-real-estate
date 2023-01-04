<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $provinces = \App\Models\Provinces::all();
        view()->share('provinces', $provinces);

        $categories = \App\Models\Category::all();
        view()->share('categories', $categories);
    }
}
