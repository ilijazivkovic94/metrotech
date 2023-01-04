<?php

namespace App\Repositories\Backend\HomeVideo;

use DB;
use Carbon\Carbon;
use App\Models\HomeVideo\HomeVideo;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class HomeVideoRepository.
 */
class HomeVideoRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = HomeVideo::class;

    
    /**
     * Home video path.
     *
     * @var string
     */
    protected $home_video_path;

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
        $this->home_video_link = 'img'.DIRECTORY_SEPARATOR.'homevideo'.DIRECTORY_SEPARATOR;
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
            ->select([
                config('module.homevideos.table').'.id',
                config('module.homevideos.table').'.title',
                config('module.homevideos.table').'.video_link',
                config('module.homevideos.table').'.video_file_link',
                config('module.homevideos.table').'.status',
                config('module.homevideos.table').'.created_at',
                config('module.homevideos.table').'.updated_at',
            ]);
    }

    /**
     * For updating the respective Model in storage
     *
     * @param HomeVideo $homevideo
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(HomeVideo $homevideo, array $input)
    {
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['updated_by'] = access()->user()->id;
        
        if (!empty($input['video_file_link'])) {
            $this->removeImage();
            
            $input['video_file_link'] = $this->uploadImage($input['video_file_link']);
        }
    	if ($homevideo->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.homevideos.update_error'));
    }
    
     /*
     * Upload logo image
     */
    public function uploadImage($image)
    {
        $path = $this->home_video_link;

        $image_name = time().$image->getClientOriginalName();
        

        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));

        return $image_name;
    }

    /*
     * remove logo or favicon icon
     */
    public function removeImage()
    {
        $path = $this->home_video_link;

        if ($this->storage->exists($path)) {
            $this->storage->delete($path);
        
        } 
        return true;
        // else {
        //     throw new GeneralException(trans('exceptions.backend.sliders.update_error'));
        // }

        
    }

}
