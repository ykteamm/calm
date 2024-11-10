<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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
//        $urlArray = explode('/', request()->path());
//        $locale = $urlArray[0];
//        app()->setLocale($locale);

//        dd(App::getLocale());

    }
}
