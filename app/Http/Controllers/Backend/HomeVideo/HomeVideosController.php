<?php

namespace App\Http\Controllers\Backend\HomeVideo;

use App\Models\HomeVideo\HomeVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\HomeVideo\CreateResponse;
use App\Http\Responses\Backend\HomeVideo\EditResponse;
use App\Repositories\Backend\HomeVideo\HomeVideoRepository;
use App\Http\Requests\Backend\HomeVideo\ManageHomeVideoRequest;
use App\Http\Requests\Backend\HomeVideo\EditHomeVideoRequest;
use App\Http\Requests\Backend\HomeVideo\UpdateHomeVideoRequest;

/**
 * HomeVideosController
 */
class HomeVideosController extends Controller
{
    /**
     * variable to store the repository object
     * @var HomeVideoRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param HomeVideoRepository $repository;
     */
    public function __construct(HomeVideoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\HomeVideo\ManageHomeVideoRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageHomeVideoRequest $request)
    {
        return new ViewResponse('backend.homevideos.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\HomeVideo\HomeVideo  $homevideo
     * @param  EditHomeVideoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\HomeVideo\EditResponse
     */
    public function edit(HomeVideo $homevideo, EditHomeVideoRequest $request)
    {
        return new EditResponse($homevideo);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateHomeVideoRequestNamespace  $request
     * @param  App\Models\HomeVideo\HomeVideo  $homevideo
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateHomeVideoRequest $request, HomeVideo $homevideo)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $homevideo, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.homevideos.edit', $homevideo->id), ['flash_success' => trans('alerts.backend.homevideos.updated')]);
    }
    
}
