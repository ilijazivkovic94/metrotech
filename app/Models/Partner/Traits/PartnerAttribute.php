<?php

namespace App\Models\partner\Traits;

/**
 * Class partnerAttribute.
 */
trait partnerAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    '.$this->getEditButtonAttribute('edit-partner', 'admin.partners.edit').'
                    '.$this->getViewButtonAttribute().'                    
                    '.$this->getDeleteButtonAttribute('delete-partner', 'admin.partners.destroy').'
                </div>';
    }
    /**
     * @return string
     */
    public function getViewButtonAttribute()
    {
        return '<a target="_blank" href="/" class="btn btn-flat btn-default">
                    <i data-toggle="tooltip" data-placement="top" title="View slider" class="fa fa-eye"></i>
                </a>';
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>".trans('labels.general.active').'</label>';
        }

        return "<label class='label label-danger'>".trans('labels.general.inactive').'</label>';
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }
}
