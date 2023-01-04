<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\HomeVideoResource;
use App\Models\HomeVideo\HomeVideo;
use App\Repositories\Backend\HomeVideo\HomeVideoRepository;
use Illuminate\Http\Request;
use Validator;

class HomeVideoController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(HomeVideoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the homevideos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : config('module.homevideos.table', 'homevideos').'.created_at';

        return HomeVideoResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param HomeVideos $homeVideo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(HomeVideo $homeVideo)
    {
        
        return new HomeVideoResource($homeVideo);
    }

    
    public function get_data(Request $request)
    {
        return  HomeVideo::where('status', '1')->get();
    }


    /**
     * Creates the Resource for HomeVideo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->validateHomeVideos($request);
        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $homeVideo = $this->repository->create($request->all());

        return new HomeVideoResource($homeVideo);
    }

    /**
     *  Update HomeVideo.
     *
     * @param HomeVideo    $homeVideo
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, HomeVideo $homeVideo)
    {
        $validation = $this->validateHomeVideos($request, $homeVideo->id);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->update($homeVideo, $request->all());

        $homeVideo = HomeVideo::findOrfail($homeVideo->id);

        return new HomeVideoResource($homeVideo);
    }

    /**
     *  Delete HomeVideo.
     *
     * @param HomeVideo              $homeVideo
     * @param DeleteHomeVideoRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(HomeVideo $homeVideo, Request $request)
    {
        $this->repository->delete($homeVideo);

        return $this->respond([
            'message' => trans('alerts.backend.homevideos.deleted'),
        ]);
    }


    /**
     * validateUser HomeVideos Requests.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateHomeVideos(Request $request, $id = 0)
    {
        $validation = Validator::make($request->all(), [
            'title'       => 'required|max:191|unique:homevideos,title,'.$id,
            'banner' => 'required',
            'body' => 'required',
            'video' => 'required',
            'schedule ' => 'required',
        ]);

        return $validation;
    }
}
