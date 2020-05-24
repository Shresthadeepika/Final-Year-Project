<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentRequestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $vehicle;
    public $vehicle_owner;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$vehicle_owner,$vehicle)
    {
        $this->user = $user;
        $this->vehicle_owner = $vehicle_owner;
        $this->email = $vehicle_owner->email;
        $this->vehicle = $vehicle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('SEND_MAIL_ADDRESS'))->to($this->email)->view('pages.mail.requestRent');
    }
}
