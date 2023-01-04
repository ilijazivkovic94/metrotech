<?php

namespace App\Repositories\Backend\Slider;

use DB;
use Carbon\Carbon;
use App\Models\Slider\Slider;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SliderRepository.
 */
class SliderRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Slider::class;

     

    /**
     * Slider image path.
     *
     * @var string
     */
    protected $slider_img_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->slider_img_path = 'img'.DIRECTORY_SEPARATOR.'slider'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
        ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.sliders.table').'.created_by')
        ->select([
            config('module.sliders.table').'.id',
            config('module.sliders.table').'.title',
            config('module.sliders.table').'.desc',
            config('module.sliders.table').'.slider_name',
            config('module.sliders.table').'.image_link',
            config('module.sliders.table').'.button_text',
            config('module.sliders.table').'.button_link',
            config('module.sliders.table').'.indicator_text',
            config('module.sliders.table').'.order',
            config('module.sliders.table').'.status',
            config('module.sliders.table').'.created_at',
            config('module.sliders.table').'.updated_at',
            config('access.users_table').'.first_name as created_by',
        ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
         // Making extra fields
         $input['status'] = isset($input['status']) ? 1 : 0;
         $input['created_by'] = auth()->id();
         
        if (!empty($input['image_link'])) {
            $this->removeImage();
            $input['image_link'] = $this->uploadImage($input['image_link']);
        }
        if (Slider::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.sliders.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Slider $slider
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update( $slider,  $input)
    {
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['updated_by'] = access()->user()->id;

        if (!empty($input['image_link'])) {
            $this->removeImage();
            
            $input['image_link'] = $this->uploadImage($input['image_link']);
        }
    	if ($slider->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.sliders.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Slider $slider
     * @throws GeneralException
     * @return bool
     */
    public function delete(Slider $slider)
    {
        if ($slider->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.sliders.delete_error'));
    }
    /*
     * Upload logo image
     */
    public function uploadImage($image)
    {
        $path = $this->slider_img_path;

        $image_name = time().$image->getClientOriginalName();
        

        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));

        return $image_name;
    }

    /*
     * remove logo or favicon icon
     */
    public function removeImage()
    {
        $path = $this->slider_img_path;

        if ($this->storage->exists($path)) {
            $this->storage->delete($path);
        
        } 
        return true;
        // else {
        //     throw new GeneralException(trans('exceptions.backend.sliders.update_error'));
        // }

        
    }
}
