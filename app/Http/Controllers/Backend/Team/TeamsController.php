<?php

namespace App\Http\Controllers\Backend\Team;

use App\Models\Team\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Team\CreateResponse;
use App\Http\Responses\Backend\Team\EditResponse;
use App\Repositories\Backend\Team\TeamRepository;
use App\Http\Requests\Backend\Team\ManageTeamRequest;
use App\Http\Requests\Backend\Team\CreateTeamRequest;
use App\Http\Requests\Backend\Team\StoreTeamRequest;
use App\Http\Requests\Backend\Team\EditTeamRequest;
use App\Http\Requests\Backend\Team\UpdateTeamRequest;
use App\Http\Requests\Backend\Team\DeleteTeamRequest;

/**
 * TeamsController
 */
class TeamsController extends Controller
{
    /**
     * variable to store the repository object
     * @var TeamRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TeamRepository $repository;
     */
    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Team\ManageTeamRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTeamRequest $request)
    {
        return new ViewResponse('backend.teams.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTeamRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Team\CreateResponse
     */
    public function create(CreateTeamRequest $request)
    {
        return new CreateResponse('backend.teams.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTeamRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTeamRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.teams.index'), ['flash_success' => trans('alerts.backend.teams.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Team\Team  $team
     * @param  EditTeamRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Team\EditResponse
     */
    public function edit(Team $team, EditTeamRequest $request)
    {
        return new EditResponse($team);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTeamRequestNamespace  $request
     * @param  App\Models\Team\Team  $team
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $team, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.teams.index'), ['flash_success' => trans('alerts.backend.teams.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTeamRequestNamespace  $request
     * @param  App\Models\Team\Team  $team
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Team $team, DeleteTeamRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($team);
        //returning with successfull message
        return new RedirectResponse(route('admin.teams.index'), ['flash_success' => trans('alerts.backend.teams.deleted')]);
    }
    
}
