<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $cus;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cus)
    {
        $this->cus = $cus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.auth.email_verification_mail')->with([
            'cus'=> $this->cus
        ]);
    }
}
