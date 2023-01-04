<?php

namespace App\Listeners\Backend\HomeVideo;

use App\Events\Backend\HomeVideo\HomeVideo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HomeVideoListener
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
     * @param  HomeVideo  $event
     * @return void
     */
    public function handle(HomeVideo $event)
    {
        //
    }
}
