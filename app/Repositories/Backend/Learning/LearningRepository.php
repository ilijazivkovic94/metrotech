<?php

namespace App\Repositories\Backend\Learning;

use DB;
use Carbon\Carbon;
use App\Models\Learning\Learning;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
/**
 * Class LearningRepository.
 */
class LearningRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Learning::class;
    
    /**
     * learning image path.
     *
     * @var string
     */
    protected $learning_img_path;

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
        $this->learning_img_path = 'img'.DIRECTORY_SEPARATOR.'learning'.DIRECTORY_SEPARATOR;
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
        ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.learnings.table').'.created_by')
        ->select([
            config('module.learnings.table').'.id',
            config('module.learnings.table').'.title',
            config('module.learnings.table').'.image_link',
            config('module.learnings.table').'.button_text',
            config('module.learnings.table').'.button_link',
            config('module.learnings.table').'.order',
            config('module.learnings.table').'.indicator_text',
            config('module.learnings.table').'.status',
            config('module.learnings.table').'.created_at',
            config('module.learnings.table').'.updated_at',
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
        if (Learning::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.learnings.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Learning $learning
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Learning $learning, array $input)
    {
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['updated_by'] = access()->user()->id;
        if (!empty($input['image_link'])) {
            $this->removeImage();
            
            $input['image_link'] = $this->uploadImage($input['image_link']);
        }
    	if ($learning->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.learnings.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Learning $learning
     * @throws GeneralException
     * @return bool
     */
    public function delete(Learning $learning)
    {
        if ($learning->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.learnings.delete_error'));
    }

     /*
     * Upload logo image
     */
    public function uploadImage($image)
    {
        $path = $this->learning_img_path;

        $image_name = time().$image->getClientOriginalName();
        

        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));

        return $image_name;
    }

    /*
     * remove logo or favicon icon
     */
    public function removeImage()
    {
        $path = $this->learning_img_path;

        if ($this->storage->exists($path)) {
            $this->storage->delete($path);
        
        } 
        return true;
        // else {
        //     throw new GeneralException(trans('exceptions.backend.sliders.update_error'));
        // }

        
    }
}
