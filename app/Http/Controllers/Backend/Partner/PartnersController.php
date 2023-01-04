<?php

namespace App\Http\Controllers\Backend\Partner;

use App\Models\Partner\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Partner\CreateResponse;
use App\Http\Responses\Backend\Partner\EditResponse;
use App\Repositories\Backend\Partner\PartnerRepository;
use App\Http\Requests\Backend\Partner\ManagePartnerRequest;
use App\Http\Requests\Backend\Partner\CreatePartnerRequest;
use App\Http\Requests\Backend\Partner\StorePartnerRequest;
use App\Http\Requests\Backend\Partner\EditPartnerRequest;
use App\Http\Requests\Backend\Partner\UpdatePartnerRequest;
use App\Http\Requests\Backend\Partner\DeletePartnerRequest;

/**
 * PartnersController
 */
class PartnersController extends Controller
{
    /**
     * variable to store the repository object
     * @var PartnerRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PartnerRepository $repository;
     */
    public function __construct(PartnerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Partner\ManagePartnerRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePartnerRequest $request)
    {
        return new ViewResponse('backend.partners.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePartnerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Partner\CreateResponse
     */
    public function create(CreatePartnerRequest $request)
    {
        return new CreateResponse('backend.partners.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePartnerRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePartnerRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.partners.index'), ['flash_success' => trans('alerts.backend.partners.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Partner\Partner  $partner
     * @param  EditPartnerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Partner\EditResponse
     */
    public function edit(Partner $partner, EditPartnerRequest $request)
    {
        return new EditResponse($partner);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePartnerRequestNamespace  $request
     * @param  App\Models\Partner\Partner  $partner
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $partner, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.partners.index'), ['flash_success' => trans('alerts.backend.partners.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePartnerRequestNamespace  $request
     * @param  App\Models\Partner\Partner  $partner
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Partner $partner, DeletePartnerRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($partner);
        //returning with successfull message
        return new RedirectResponse(route('admin.partners.index'), ['flash_success' => trans('alerts.backend.partners.deleted')]);
    }
    
}
