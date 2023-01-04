<?php

namespace App\Listeners\Backend\Partner;

use App\Events\Backend\Partner\Partner;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PartnerListener
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
     * @param  Partner  $event
     * @return void
     */
    public function handle(Partner $event)
    {
        //
    }
}
