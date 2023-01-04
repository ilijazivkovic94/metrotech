<?php

namespace App\Listeners\Backend\Slider;

use App\Events\Backend\Slider\Slider;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SliderListener
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
     * @param  Slider  $event
     * @return void
     */
    public function handle(Slider $event)
    {
        //
    }
}
