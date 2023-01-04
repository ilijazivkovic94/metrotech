<?php

namespace App\Repositories\Backend\Partner;

use DB;
use Carbon\Carbon;
use App\Models\Partner\Partner;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class PartnerRepository.
 */
class PartnerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Partner::class;

     

    /**
     * Partner image path.
     *
     * @var string
     */
    protected $partner_img_path;

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
        $this->partner_img_path = 'img'.DIRECTORY_SEPARATOR.'partner'.DIRECTORY_SEPARATOR;
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
        ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.partners.table').'.created_by')
        ->select([
            config('module.partners.table').'.id',
            config('module.partners.table').'.title',
            config('module.partners.table').'.image_link',
            config('module.partners.table').'.partner_link',
            config('module.partners.table').'.order',
            config('module.partners.table').'.status',
            config('module.partners.table').'.created_at',
            config('module.partners.table').'.updated_at',
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
        if (Partner::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.partners.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Partner $partner
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update( $partner,  $input)
    {
        
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['updated_by'] = access()->user()->id;

        if (!empty($input['image_link'])) {
            $this->removeImage();
            
            $input['image_link'] = $this->uploadImage($input['image_link']);
        }
    	if ($partner->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.partners.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Partner $partner
     * @throws GeneralException
     * @return bool
     */
    public function delete(Partner $partner)
    {
        if ($partner->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.partners.delete_error'));
    }
    /*
     * Upload logo image
     */
    public function uploadImage($image)
    {
        $path = $this->partner_img_path;

        $image_name = time().$image->getClientOriginalName();
        

        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));

        return $image_name;
    }

    /*
     * remove logo or favicon icon
     */
    public function removeImage()
    {
        $path = $this->partner_img_path;

        if ($this->storage->exists($path)) {
            $this->storage->delete($path);
        
        } 
        return true;
        // else {
        //     throw new GeneralException(trans('exceptions.backend.partners.update_error'));
        // }

        
    }
}
