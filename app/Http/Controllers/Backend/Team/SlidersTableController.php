<?php

namespace App\Http\Controllers\Backend\Slider;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Slider\SliderRepository;
use App\Http\Requests\Backend\Slider\ManageSliderRequest;

/**
 * Class SlidersTableController.
 */
class SlidersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SliderRepository
     */
    protected $slider;

    /**
     * contructor to initialize repository object
     * @param SliderRepository $slider;
     */
    public function __construct(SliderRepository $slider)
    {
        $this->slider = $slider;
    }

    /**
     * This method return the data of the model
     * @param ManageSliderRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSliderRequest $request)
    {
        return Datatables::of($this->slider->getForDataTable())
            ->escapeColumns(['slider_name'])
            ->addColumn('status', function ($slider) {
                return $slider->status_label;
            })
            ->addColumn('created_at', function ($slider) {
                return $slider->created_at->toDateString();
            })
            ->addColumn('created_by', function ($slider) {
                return $slider->created_by;
            })
            ->addColumn('actions', function ($slider) {
                return $slider->action_buttons;
            })
            ->make(true);
    }
}
