<?php

namespace App\Repositories\Backend\Pages;

use App\Events\Backend\Pages\PageCreated;
use App\Events\Backend\Pages\PageDeleted;
use App\Events\Backend\Pages\PageUpdated;
use App\Exceptions\GeneralException;
use App\Models\Page\Page;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * Class PagesRepository.
 */
class PagesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Page::class;

    /**
     * Site Logo Path.
     *
     * @var string
     */
    protected $banner_path;

    /**
     * Favicon path.
     *
     * @var string
     */
    protected $video_path;

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
        $this->banner_path = 'img'.DIRECTORY_SEPARATOR.'banner'.DIRECTORY_SEPARATOR;
        $this->video_path = 'img'.DIRECTORY_SEPARATOR.'video'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.pages.table').'.created_by')
            ->select([
                config('module.pages.table').'.id',
                config('module.pages.table').'.title',
                config('module.pages.table').'.page_slug',
                config('module.pages.table').'.status',
                config('module.pages.table').'.created_at',
                config('module.pages.table').'.updated_at',
                config('access.users_table').'.first_name as created_by',
                config('module.pages.table').'.pages_data',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        if ($this->query()->where('title', $input['title'])->first()) {
            throw new GeneralException(trans('exceptions.backend.pages.already_exists'));
        }

        // Making extra fields
        $input['page_slug'] = Str::slug($input['title']);
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_by'] = auth()->id();

        $input['pages_data']['slider'] = isset($input['slider']) ? 1 : 0;
        $input['pages_data']['team'] = isset($input['team']) ? 1 : 0;
        $input['pages_data']['partner'] = isset($input['partner']) ? 1 : 0;
        $input['pages_data']['learning'] = isset($input['learning']) ? 1 : 0;
        $input['pages_data']['home_video'] = isset($input['home_video']) ? 1 : 0;

        $input['pages_data'] = json_encode($input['pages_data']);
        if (!empty($input['page_type']) && $input['page_type'] != 'standard') { 
            $input['title'] = $input['page_type'];
        }
        
        if (!empty($input['banner'])) {
            $this->removeImage('banner');
            
            $input['banner'] = $this->uploadImage($input['banner'], 'banner');
        }
        if (!empty($input['video'])) {
            $this->removeImage('video');
            
            $input['video'] = $this->uploadImage($input['video'], 'video');
        }

        if ($page = Page::create($input)) {
            event(new PageCreated($page));

            return $page;
        }

        throw new GeneralException(trans('exceptions.backend.pages.create_error'));
    }

    /**
     * @param \App\Models\Page\Page $page
     * @param array                 $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function update($page, array $input)
    {
        if ($this->query()->where('title', $input['title'])->where('id', '!=', $page->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.pages.already_exists'));
        }

        // Making extra fields
        $input['page_slug'] = Str::slug($input['title']);
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['updated_by'] = access()->user()->id;
        
        $input['pages_data']['slider'] = isset($input['pages_data']['slider']) ? 1 : 0;
        $input['pages_data']['team'] = isset($input['pages_data']['team']) ? 1 : 0;
        $input['pages_data']['partner'] = isset($input['pages_data']['partner']) ? 1 : 0;
        $input['pages_data']['learning'] = isset($input['pages_data']['learning']) ? 1 : 0;
        $input['pages_data']['home_video'] = isset($input['pages_data']['home_video']) ? 1 : 0;

        

        $input['pages_data'] = json_encode($input['pages_data']);
        if (!empty($input['page_type']) && $input['page_type'] != 'standard') { 
            $input['title'] = $input['page_type'];
        }

        if (!empty($input['banner'])) {
            $this->removeImage('banner');
            
            $input['banner'] = $this->uploadImage($input['banner'], 'banner');
        }
        if (!empty($input['video'])) {
            $this->removeImage('video');
            
            $input['video'] = $this->uploadImage($input['video'], 'video');
        }
        

        if ($page->update($input)) {
            event(new PageUpdated($page));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.pages.update_error'));
    }

    /**
     * @param \App\Models\Page\Page $page
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function delete($page)
    {
        if ($page->delete()) {
            event(new PageDeleted($page));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.pages.delete_error'));
    }
       /*
     * Upload logo image
     */
    public function uploadImage($image, $type)
    {
        $path = $type == 'banner' ? $this->banner_path : $this->video_path;

        $image_name = time().$image->getClientOriginalName();
        

        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));

        return $image_name;
    }

    /*
     * remove logo or favicon icon
     */
    public function removeImage($type)
    {
        $path = $type == 'banner' ? $this->banner_path : $this->video_path;

        if ($this->storage->exists($path)) {
            $this->storage->delete($path);
        
        } 
        return true;
        // else {
        //     throw new GeneralException(trans('exceptions.backend.sliders.update_error'));
        // }

        
    }
}
