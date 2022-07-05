<?php

namespace App\Http\Requests\User\PostScheduler;

use Illuminate\Foundation\Http\FormRequest;

class UploadMediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // | mimes:png,jpg,bmp,jpeg,gif,tiff,webm
            'post_media' => ['mimetypes:video/avi,video/mp4,video/quicktime,image/png,image/jpg,image/bmp,image/jpeg,image/gif,image/tiff,image/webm', 'max:' . (1024 * 1024) * 5],
            'caption' => ['required'],
            'platform' => ['required', 'array', 'min:1'],
            'profile_select' => ['required'],
            'posted_by' => ['required'],
        ];
    }
}
