<?php

namespace App\Http\Requests\Api\Youtube\Video;

use Illuminate\Foundation\Http\FormRequest;

class GetVideoListFromName extends FormRequest
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
            'videoName' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}
