<?php

namespace App\Listeners\Backend\Team;

use App\Events\Backend\Team\Team;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TeamListener
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
     * @param  Team  $event
     * @return void
     */
    public function handle(Team $event)
    {
        //
    }
}
