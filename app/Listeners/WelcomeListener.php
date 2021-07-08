<?php

namespace App\Listeners;

use App\Events\WelcomeEvent;
use App\Notifications\WelcomeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WelcomeEvent  $event
     * @return void
     */
    public function handle(WelcomeEvent $event)
    {
        $event->user->notify(new WelcomeNotification());
    }
}
