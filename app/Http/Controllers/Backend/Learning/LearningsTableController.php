<?php

namespace App\Http\Controllers\Backend\Learning;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Learning\LearningRepository;
use App\Http\Requests\Backend\Learning\ManageLearningRequest;

/**
 * Class LearningsTableController.
 */
class LearningsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var LearningRepository
     */
    protected $learning;

    /**
     * contructor to initialize repository object
     * @param LearningRepository $learning;
     */
    public function __construct(LearningRepository $learning)
    {
        $this->learning = $learning;
    }

    /**
     * This method return the data of the model
     * @param ManageLearningRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageLearningRequest $request)
    {
        return Datatables::of($this->learning->getForDataTable())
            ->escapeColumns(['title'])
            ->addColumn('status', function ($learning) {
                return $learning->status_label;
            })
            ->addColumn('created_at', function ($learning) {
                return $learning->created_at->toDateString();
            })
            ->addColumn('created_by', function ($learning) {
                return $learning->created_by;
            })
            ->addColumn('actions', function ($learning) {
                return $learning->action_buttons;
            })
            ->make(true);
    }
}
