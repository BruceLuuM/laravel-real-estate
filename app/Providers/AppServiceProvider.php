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

            // $investers = \App\Models\Invester::latest()->paginate(5);
            // view()->share('investers', $investers);

            $provinces = \App\Models\Provinces::orderBy('name')->get();
            view()->share('provinces', $provinces);

            $districts = \App\Models\Districts::orderBy('name')->get();
            view()->share('districts', $districts);

            $wards = \App\Models\Wards::orderBy('name')->get();
            view()->share('wards', $wards);

            $projects = \App\Models\project::orderBy('name')->get();
            view()->share('projects', $projects);

            //temp
            // $news_blogs = \App\Models\news_blog::orderBy('name')->get();
            // view()->share('news_blogs', $news_blogs);


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
