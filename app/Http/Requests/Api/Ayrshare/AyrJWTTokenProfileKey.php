<?php

namespace App\Http\Requests\Api\Ayrshare;

use Illuminate\Foundation\Http\FormRequest;

class AyrJWTTokenProfileKey extends FormRequest
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
<<<<<<< HEAD
            'profileKey' => 'required',
=======
            'profileKey' => 'required'
>>>>>>> jimmy-24122021-merge-issue
        ];
    }
}
