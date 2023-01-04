<?php

namespace App\Http\Responses\Backend\Learning;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Learning\Learning
     */
    protected $learnings;

    /**
     * @param App\Models\Learning\Learning $learnings
     */
    public function __construct($learnings)
    {
        $this->learnings = $learnings;
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
        return view('backend.learnings.edit')->with([
            'learnings' => $this->learnings
        ]);
    }
}