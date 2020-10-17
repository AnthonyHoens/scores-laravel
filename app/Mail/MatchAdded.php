<?php

namespace App\Mail;

use App\Models\Match;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $match;

    /**
     * Create a new message instance.
     *
     * @param Match $match
     */
    public function __construct(Match $match)
    {
        $this->match = $match;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.match.added')
            ->from('anthony.hoens@student.hepl.be');
    }
}
