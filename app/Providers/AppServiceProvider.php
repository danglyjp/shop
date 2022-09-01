<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Articles;
use App\Models\Category;

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
        $setting = Setting::first();
        View::share('setting',$setting);

        $article = Articles::latest()->paginate(4);
        View::share('article',$article);
        
        $categoryList = Category::where(['is_active'=>1])->get();
        View::share('categoryList',$categoryList);
    }
}
