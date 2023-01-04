<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\TeamsResource;
use App\Models\Team\Team;
use App\Repositories\Backend\Team\TeamRepository;
use Illuminate\Http\Request;
use Validator;

class TeamsController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the teams.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : config('module.teams.table', 'teams').'.order';

        return TeamsResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param Teams $team
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Team $team)
    {
        
        return new TeamsResource($team);
    }

    
    public function get_data(Request $request)
    {
        return  Team::where('status', '1')->get();
    }


    /**
     * Creates the Resource for Team.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->validateTeams($request);
        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $team = $this->repository->create($request->all());

        return new TeamsResource($team);
    }

    /**
     *  Update Team.
     *
     * @param Team    $team
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Team $team)
    {
        $validation = $this->validateTeams($request, $team->id);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->update($team, $request->all());

        $team = Team::findOrfail($team->id);

        return new TeamsResource($team);
    }

    /**
     *  Delete Team.
     *
     * @param Team              $team
     * @param DeleteTeamRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Team $team, Request $request)
    {
        $this->repository->delete($team);

        return $this->respond([
            'message' => trans('alerts.backend.teams.deleted'),
        ]);
    }


    /**
     * validateUser Teams Requests.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateTeams(Request $request, $id = 0)
    {
        $validation = Validator::make($request->all(), [
            'title'       => 'required|max:191|unique:teams,title,'.$id,
            'banner' => 'required',
            'body' => 'required',
            'video' => 'required',
            'schedule ' => 'required',
        ]);

        return $validation;
    }
}
