<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'txtname' => 'required|string|min:2|max:50',
            'txtemail' => 'required|string|email|max:255',
            'txtmessage' => ['required','max:512','min:5'],
        ];
    }
}
