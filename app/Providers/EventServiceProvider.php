<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\ProfileNotificationEvent;
use App\Events\WelcomeEvent;
use App\Listeners\ProfileNotificationListener;
use App\Listeners\SendPostCreatedNotification;
use App\Listeners\WelcomeListener;
use App\Models\Post;
use App\Models\User;
use App\Observers\PostObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ProfileNotificationEvent::class => [
            ProfileNotificationListener::class,
        ],

        PostCreated::class => [
            SendPostCreatedNotification::class,
        ],
        WelcomeEvent::class => [
            WelcomeListener::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
    }
}
