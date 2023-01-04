<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\PartnersResource;
use App\Models\Partner\Partner;
use App\Repositories\Backend\Partner\PartnerRepository;
use Illuminate\Http\Request;
use Validator;

class PartnersController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(PartnerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the partners.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : config('module.partners.table', 'partners').'.order';

        return PartnersResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param Partners $partner
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Partner $partner)
    {
        
        return new PartnersResource($partner);
    }

    
    public function get_data(Request $request)
    {
        return  Partner::where('status', '1')->get();
    }


    /**
     * Creates the Resource for Partner.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->validatePartners($request);
        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $partner = $this->repository->create($request->all());

        return new PartnersResource($partner);
    }

    /**
     *  Update Partner.
     *
     * @param Partner    $partner
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Partner $partner)
    {
        $validation = $this->validatePartners($request, $partner->id);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->update($partner, $request->all());

        $partner = Partner::findOrfail($partner->id);

        return new PartnersResource($partner);
    }

    /**
     *  Delete Partner.
     *
     * @param Partner              $partner
     * @param DeletePartnerRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Partner $partner, Request $request)
    {
        $this->repository->delete($partner);

        return $this->respond([
            'message' => trans('alerts.backend.partners.deleted'),
        ]);
    }


    /**
     * validateUser Partners Requests.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validatePartners(Request $request, $id = 0)
    {
        $validation = Validator::make($request->all(), [
            'title'       => 'required|max:191|unique:partners,title,'.$id,
            'banner' => 'required',
            'body' => 'required',
            'video' => 'required',
            'schedule ' => 'required',
        ]);

        return $validation;
    }
}
