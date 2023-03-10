<?php

namespace App\Http\Requests\Backend\Pages;

use App\Http\Requests\Request;

/**
 * Class UpdatePageRequest.
 */
class UpdatePageRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-page');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'title'       => 'required|max:191',
            // 'banner' => 'required',
            // 'body' => 'required',
            // 'video' => 'required',
            // 'schedule' => 'required',
        ];
    }
}
