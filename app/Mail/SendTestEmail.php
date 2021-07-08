<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, User $user)
    {
        $this->title = $data['title'];

        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('testemail');
    }
}
