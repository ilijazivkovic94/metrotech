<?php

namespace App\Listeners\Backend\Learning;

use App\Events\Backend\Learning\Learning;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LearningListener
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
     * @param  Learning  $event
     * @return void
     */
    public function handle(Learning $event)
    {
        //
    }
}
