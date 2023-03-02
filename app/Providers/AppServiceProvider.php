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
        try {
            $categories = \App\Models\Category::all();
            view()->share('categories', $categories);

            $provinces = \App\Models\Provinces::orderBy('name')->get();
            view()->share('provinces', $provinces);

            // $modules = \App\Models\Module::all()->keyBy('module_position');
            $modules = \App\Models\Module::orderBy('module_position', 'ASC')->get();
            // dd($modules);
            view()->share('modules_for_sidebar', $modules);

            $moduleFunctions = \App\Models\ModuleFunction::all();
            view()->share('moduleFunctions', $moduleFunctions);
        } catch (\Exception $ignored) {
        }

        // $districts = \App\Models\Districts::all();
        // view()->share('districts', $districts);

        // $wards = \App\Models\Wards::all();
        // view()->share('wards', $wards);
    }
}
