<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\LearningsResource;
use App\Models\Learning\Learning;
use App\Repositories\Backend\Learning\LearningRepository;
use Illuminate\Http\Request;
use Validator;

class LearningsController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(LearningRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the learnings.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : config('module.learnings.table', 'learnings').'.order';

        return LearningsResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param Learnings $learning
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Learning $learning)
    {
        
        return new LearningsResource($learning);
    }

    
    public function get_data(Request $request)
    {
        return  Learning::where('status', '1')->get();
    }


    /**
     * Creates the Resource for Learning.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->validateLearnings($request);
        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $learning = $this->repository->create($request->all());

        return new LearningsResource($learning);
    }

    /**
     *  Update Learning.
     *
     * @param Learning    $learning
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Learning $learning)
    {
        $validation = $this->validateLearnings($request, $learning->id);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->update($learning, $request->all());

        $learning = Learning::findOrfail($learning->id);

        return new LearningsResource($learning);
    }

    /**
     *  Delete Learning.
     *
     * @param Learning              $learning
     * @param DeleteLearningRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Learning $learning, Request $request)
    {
        $this->repository->delete($learning);

        return $this->respond([
            'message' => trans('alerts.backend.learnings.deleted'),
        ]);
    }


    /**
     * validateUser Learnings Requests.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateLearnings(Request $request, $id = 0)
    {
        $validation = Validator::make($request->all(), [
            'title'       => 'required|max:191|unique:learnings,title,'.$id,
            'banner' => 'required',
            'body' => 'required',
            'video' => 'required',
            'schedule ' => 'required',
        ]);

        return $validation;
    }
}
