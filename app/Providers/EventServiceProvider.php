<?php

namespace App\Providers;

use App\Models\Meditation;
use App\Models\Meditator;
use App\Observers\MeditationObserver;
use App\Observers\MeditatorObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Meditator::observe([MeditatorObserver::class]);
        Meditation::observe([MeditationObserver::class]);
    }
}
