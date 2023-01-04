<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class HomeVideoResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'video_link'         => $this->video_link,
            'video_file_link'         => $this->video_file_link,
            'status_label'  => $this->status_label,
            'status'        => ($this->isActive()) ? 'Active' : 'InActive',
            'created_at'    => $this->created_at->toDateString(),
            'created_by'    => is_int($this->created_by) ? optional($this->owner)->first_name : $this->created_by,
        ];
    }
}
