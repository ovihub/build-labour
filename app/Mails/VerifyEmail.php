<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $verify_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verify_token)
    {
        $this->verify_token = $verify_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verify')
                ->subject('Verify Your E-mail Address')
                ->from(env('APP_MAIL_ADDRESS'), 'Appetiser')
                ->with('verify_token', $this->verify_token);
    }
}
