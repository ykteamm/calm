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
        $locale = request()->segment(1);
        try {
            if (Language::where('code', $locale)->exists()) {
                app()->setLocale($locale);
            } else {
                app()->setLocale(config('app.default_locale'));
            }
        } catch (\Throwable $th) {
        }
    }
}
