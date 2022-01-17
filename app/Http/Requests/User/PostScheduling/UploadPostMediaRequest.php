<?php

namespace App\Http\Requests\User\PostScheduling;

use Illuminate\Foundation\Http\FormRequest;

class UploadPostMediaRequest extends FormRequest
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
            'post_media' => ['required'],
            'caption' => ['required'],
            'platform' => ['required', 'array', 'min:1'],
            'profile_select' => ['required'],
            'postedBy' => ['required'],
        ];
    }
}
