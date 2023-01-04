<?php

namespace App\Http\Controllers\Backend\Partner;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Partner\PartnerRepository;
use App\Http\Requests\Backend\Partner\ManagePartnerRequest;

/**
 * Class PartnersTableController.
 */
class PartnersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PartnerRepository
     */
    protected $partner;

    /**
     * contructor to initialize repository object
     * @param PartnerRepository $partner;
     */
    public function __construct(PartnerRepository $partner)
    {
        $this->partner = $partner;
    }

    /**
     * This method return the data of the model
     * @param ManagePartnerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePartnerRequest $request)
    {
        return Datatables::of($this->partner->getForDataTable())
            ->escapeColumns(['partner_name'])
            ->addColumn('status', function ($partner) {
                return $partner->status_label;
            })
            ->addColumn('created_at', function ($partner) {
                return $partner->created_at->toDateString();
            })
            ->addColumn('created_by', function ($partner) {
                return $partner->created_by;
            })
            ->addColumn('actions', function ($partner) {
                return $partner->action_buttons;
            })
            ->make(true);
    }
}
