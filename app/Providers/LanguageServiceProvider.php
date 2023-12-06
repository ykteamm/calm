<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
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
        $uri = explode('/', request()->path());
        if(isset($uri[0]) && ($code = $uri[0]) && Language::where('code', $code)->exists()) {
            app()->setLocale($code);
        }
    }
}
