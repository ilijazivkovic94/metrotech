<?php

namespace App\Http\Responses\Backend\Partner;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Partner\Partner
     */
    protected $partners;

    /**
     * @param App\Models\Partner\Partner $partners
     */
    public function __construct($partners)
    {
        $this->partners = $partners;
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
        return view('backend.partners.edit')->with([
            'partners' => $this->partners
        ]);
    }
}