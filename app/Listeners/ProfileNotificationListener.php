<?php

namespace App\Listeners;

use App\Events\ProfileNotificationEvent;
use App\Jobs\SendProfileNotificationJob;
use App\Mail\SendProfileNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ProfileNotificationListener implements ShouldQueue
{
    public int $delay = 5;

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
     * @param  ProfileNotificationEvent  $event
     * @return void
     */
    public function handle(ProfileNotificationEvent $event)
    {
        // dispatch(new SendProfileNotificationJob($event->user));
        Mail::to($event->user->email)->send(new SendProfileNotification($event->user));
    }
}
