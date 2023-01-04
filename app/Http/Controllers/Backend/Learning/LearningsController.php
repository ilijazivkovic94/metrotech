<?php

namespace App\Http\Controllers\Backend\Learning;

use App\Models\Learning\Learning;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Learning\CreateResponse;
use App\Http\Responses\Backend\Learning\EditResponse;
use App\Repositories\Backend\Learning\LearningRepository;
use App\Http\Requests\Backend\Learning\ManageLearningRequest;
use App\Http\Requests\Backend\Learning\CreateLearningRequest;
use App\Http\Requests\Backend\Learning\StoreLearningRequest;
use App\Http\Requests\Backend\Learning\EditLearningRequest;
use App\Http\Requests\Backend\Learning\UpdateLearningRequest;
use App\Http\Requests\Backend\Learning\DeleteLearningRequest;

/**
 * LearningsController
 */
class LearningsController extends Controller
{
    /**
     * variable to store the repository object
     * @var LearningRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param LearningRepository $repository;
     */
    public function __construct(LearningRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Learning\ManageLearningRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageLearningRequest $request)
    {
        return new ViewResponse('backend.learnings.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateLearningRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Learning\CreateResponse
     */
    public function create(CreateLearningRequest $request)
    {
        return new CreateResponse('backend.learnings.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLearningRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreLearningRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.learnings.index'), ['flash_success' => trans('alerts.backend.learnings.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Learning\Learning  $learning
     * @param  EditLearningRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Learning\EditResponse
     */
    public function edit(Learning $learning, EditLearningRequest $request)
    {
        return new EditResponse($learning);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLearningRequestNamespace  $request
     * @param  App\Models\Learning\Learning  $learning
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateLearningRequest $request, Learning $learning)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $learning, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.learnings.index'), ['flash_success' => trans('alerts.backend.learnings.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteLearningRequestNamespace  $request
     * @param  App\Models\Learning\Learning  $learning
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Learning $learning, DeleteLearningRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($learning);
        //returning with successfull message
        return new RedirectResponse(route('admin.learnings.index'), ['flash_success' => trans('alerts.backend.learnings.deleted')]);
    }
    
}
