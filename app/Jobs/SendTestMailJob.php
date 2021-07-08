<?php

namespace App\Jobs;

use App\Mail\SendMarkdownMail;
use App\Mail\SendTestEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class SendTestMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, User $user)
    {
        $this->data = $data;

        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mail::to('masud@jrfintel.com')->send(new SendMarkdownMail($this->data));
        Mail::to('masud@jrfintel.com')->send(new SendTestEmail($this->data, $this->user));
    }
}
