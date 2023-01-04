<?php

namespace App\Http\Controllers\Backend\HomeVideo;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\HomeVideo\HomeVideoRepository;
use App\Http\Requests\Backend\HomeVideo\ManageHomeVideoRequest;

/**
 * Class HomeVideosTableController.
 */
class HomeVideosTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var HomeVideoRepository
     */
    protected $homevideo;

    /**
     * contructor to initialize repository object
     * @param HomeVideoRepository $homevideo;
     */
    public function __construct(HomeVideoRepository $homevideo)
    {
        $this->homevideo = $homevideo;
    }

    /**
     * This method return the data of the model
     * @param ManageHomeVideoRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageHomeVideoRequest $request)
    {
        return Datatables::of($this->homevideo->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($homevideo) {
                return Carbon::parse($homevideo->created_at)->toDateString();
            })
            ->addColumn('actions', function ($homevideo) {
                return $homevideo->action_buttons;
            })
            ->make(true);
    }
}
