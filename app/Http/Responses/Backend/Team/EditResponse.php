<?php

namespace App\Http\Responses\Backend\Team;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Team\Team
     */
    protected $teams;

    /**
     * @param App\Models\Team\Team $teams
     */
    public function __construct($teams)
    {
        $this->teams = $teams;
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
        return view('backend.teams.edit')->with([
            'teams' => $this->teams
        ]);
    }
}