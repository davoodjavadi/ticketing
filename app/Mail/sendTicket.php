<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use App\Models\User;
use Auth;

class sendTicket extends Mailable
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
        return $this->to(Auth::user())
                    ->subject("[کد درخواست شما:". $this->details->ticket_code . "] با عنوان :  " . $this->details->title )
                    ->view('emails.ticket_info')
                    ->with([
                        'userName' => Auth::user()->name,
                        ],
                        compact('user', 'ticket'));
    }
}
