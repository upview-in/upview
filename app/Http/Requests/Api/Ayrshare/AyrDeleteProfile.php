<?php

namespace App\Http\Requests\Api\Ayrshare;

use Illuminate\Foundation\Http\FormRequest;

class AyrDeleteProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profilekey' => 'required',
        ];
    }
}