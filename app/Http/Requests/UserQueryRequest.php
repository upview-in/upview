<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserQueryRequest extends FormRequest
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
            'query_ss' => ['required', 'image', 'max:1024'],
            'query_title' => ['required'],
            'query_description' => ['required']
        ];
    }
}
