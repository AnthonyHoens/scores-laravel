<?php

namespace App\Listeners;

use App\Events\MatchCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTeamStats
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
        //
    }
}
