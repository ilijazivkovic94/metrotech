<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\SlidersResource;
use App\Models\Slider\Slider;
use App\Repositories\Backend\Slider\SliderRepository;
use Illuminate\Http\Request;
use Validator;

class SlidersController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(SliderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the sliders.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : config('module.sliders.table', 'sliders').'.order';

        return SlidersResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param Sliders $slider
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Slider $slider)
    {
        
        return new SlidersResource($slider);
    }
    
    public function get_data(Request $request)
    {
        return  Slider::where('status', '1')->get();
    }

    /**
     * Creates the Resource for Slider.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->validateSliders($request);
        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $slider = $this->repository->create($request->all());

        return new SlidersResource($slider);
    }

    /**
     *  Update Slider.
     *
     * @param Slider    $slider
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Slider $slider)
    {
        $validation = $this->validateSliders($request, $slider->id);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->update($slider, $request->all());

        $slider = Slider::findOrfail($slider->id);

        return new SlidersResource($slider);
    }

    /**
     *  Delete Slider.
     *
     * @param Slider              $slider
     * @param DeleteSliderRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Slider $slider, Request $request)
    {
        $this->repository->delete($slider);

        return $this->respond([
            'message' => trans('alerts.backend.sliders.deleted'),
        ]);
    }


    /**
     * validateUser Sliders Requests.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateSliders(Request $request, $id = 0)
    {
        $validation = Validator::make($request->all(), [
            'title'       => 'required|max:191|unique:sliders,title,'.$id,
            'banner' => 'required',
            'body' => 'required',
            'video' => 'required',
            'schedule ' => 'required',
        ]);

        return $validation;
    }
}
