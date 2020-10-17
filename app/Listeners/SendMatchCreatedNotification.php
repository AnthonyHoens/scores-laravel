<?php

namespace App\Listeners;

use App\Events\MatchCreated;
use App\Jobs\SendMatchCreatedEmailToMatchCreator;
use App\Mail\MatchAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMatchCreatedNotification
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
     * @param  MatchCreated  $event
     * @return void
     */
    public function handle(MatchCreated $event)
    {
        //SendMatchCreatedEmailToMatchCreator::dispatch($event);
    }
}
