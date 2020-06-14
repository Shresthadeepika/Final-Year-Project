<?php

namespace App\Listeners\ApprovalEvent;

use App\Events\RentApprovalEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\RentApprovalMail;
use App\Mail\RentRejectedMail;
use Illuminate\Support\Facades\Mail;

class RentApprovalListener
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
     * @param  RentApprovalEvent  $event
     * @return void
     */
    public function handle(RentApprovalEvent $event)
    {
        if ( $event->rented->rent_status == "rented"){
            Mail::to($event->rented_to->email)->send(new RentApprovalMail($event->rented,$event->vehicle,$event->rented_to));
        }
        elseif ( $event->rented->rent_status == "Rejected"){
            Mail::to($event->rented_to->email)->send(new RentRejectedMail($event->rented,$event->vehicle,$event->rented_to));
        }
    }
}
