<?php

namespace App\Http\Responses\Backend\HomeVideo;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\HomeVideo\HomeVideo
     */
    protected $homevideos;

    /**
     * @param App\Models\HomeVideo\HomeVideo $homevideos
     */
    public function __construct($homevideos)
    {
        $this->homevideos = $homevideos;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.homevideos.edit')->with([
            'homevideos' => $this->homevideos
        ]);
    }
}