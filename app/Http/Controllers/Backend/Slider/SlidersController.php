<?php

namespace App\Http\Controllers\Backend\Slider;

use App\Models\Slider\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Slider\CreateResponse;
use App\Http\Responses\Backend\Slider\EditResponse;
use App\Repositories\Backend\Slider\SliderRepository;
use App\Http\Requests\Backend\Slider\ManageSliderRequest;
use App\Http\Requests\Backend\Slider\CreateSliderRequest;
use App\Http\Requests\Backend\Slider\StoreSliderRequest;
use App\Http\Requests\Backend\Slider\EditSliderRequest;
use App\Http\Requests\Backend\Slider\UpdateSliderRequest;
use App\Http\Requests\Backend\Slider\DeleteSliderRequest;

/**
 * SlidersController
 */
class SlidersController extends Controller
{
    /**
     * variable to store the repository object
     * @var SliderRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SliderRepository $repository;
     */
    public function __construct(SliderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Slider\ManageSliderRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSliderRequest $request)
    {
        return new ViewResponse('backend.sliders.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSliderRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Slider\CreateResponse
     */
    public function create(CreateSliderRequest $request)
    {
        return new CreateResponse('backend.sliders.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSliderRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSliderRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.sliders.index'), ['flash_success' => trans('alerts.backend.sliders.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Slider\Slider  $slider
     * @param  EditSliderRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Slider\EditResponse
     */
    public function edit(Slider $slider, EditSliderRequest $request)
    {
        return new EditResponse($slider);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSliderRequestNamespace  $request
     * @param  App\Models\Slider\Slider  $slider
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $slider, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.sliders.index'), ['flash_success' => trans('alerts.backend.sliders.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSliderRequestNamespace  $request
     * @param  App\Models\Slider\Slider  $slider
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Slider $slider, DeleteSliderRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($slider);
        //returning with successfull message
        return new RedirectResponse(route('admin.sliders.index'), ['flash_success' => trans('alerts.backend.sliders.deleted')]);
    }
    
}
