<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentRejectedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $rented;
    public $rented_to;
    public $email;
    public $vehicle;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rented,$vehicle,$rented_to)
    {
        $this->rented = $rented;
        $this->rented_to = $rented_to;
        $this->email = $rented_to->email;
        $this->vehicle = $vehicle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('SEND_MAIL_ADDRESS'))->to($this->email)->view('pages.mail.rejected');
    }
}
