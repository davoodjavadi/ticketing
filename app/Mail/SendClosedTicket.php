<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;
use App\Models\User;
use App\Models\Ticket;
use Auth;

class sendClosedTicket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Ticket $ticket, User $user)
    {
        return $this->view('emails.ticket_status')
                    ->subject("بستن درخواست :". $this->details->title )
                    ->with(
                        compact( 'ticket','user'));
    }
}
