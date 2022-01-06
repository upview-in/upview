<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ChangeAddressRequest extends FormRequest
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
            'country' => ['required', 'exists:countries,_id'],
            'state' => ['required', 'exists:states,_id'],
            'city' => ['nullable', 'exists:cities,_id'],
            'address' => ['nullable', 'min:10', 'max:512'],
        ];
    }
}
