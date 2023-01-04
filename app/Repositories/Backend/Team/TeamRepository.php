<?php

namespace App\Repositories\Backend\Team;

use DB;
use Carbon\Carbon;
use App\Models\Team\Team;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class TeamRepository.
 */
class TeamRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Team::class;

     

    /**
     * Team image path.
     *
     * @var string
     */
    protected $team_img_path;

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
        $this->team_img_path = 'img'.DIRECTORY_SEPARATOR.'team'.DIRECTORY_SEPARATOR;
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
        ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.teams.table').'.created_by')
        ->select([
            config('module.teams.table').'.id',
            config('module.teams.table').'.title',
            config('module.teams.table').'.image_link',
            config('module.teams.table').'.team_link',
            config('module.teams.table').'.order',
            config('module.teams.table').'.status',
            config('module.teams.table').'.created_at',
            config('module.teams.table').'.updated_at',
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
        if (Team::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.teams.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Team $team
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update( $team,  $input)
    {
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['updated_by'] = access()->user()->id;
        
        if (!empty($input['image_link'])) {
            $this->removeImage();
            
            $input['image_link'] = $this->uploadImage($input['image_link']);
        }
    	if ($team->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.teams.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Team $team
     * @throws GeneralException
     * @return bool
     */
    public function delete(Team $team)
    {
        if ($team->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.teams.delete_error'));
    }
    /*
     * Upload logo image
     */
    public function uploadImage($image)
    {
        $path = $this->team_img_path;

        $image_name = time().$image->getClientOriginalName();
        

        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));

        return $image_name;
    }

    /*
     * remove logo or favicon icon
     */
    public function removeImage()
    {
        $path = $this->team_img_path;

        if ($this->storage->exists($path)) {
            $this->storage->delete($path);
        
        } 
        return true;
        // else {
        //     throw new GeneralException(trans('exceptions.backend.teams.update_error'));
        // }

        
    }
}
