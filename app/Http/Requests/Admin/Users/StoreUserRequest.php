<?php

namespace App\Http\Requests\Admin\Users;

use App\Helper\Functions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'same:confirm_password', Password::min(8)],
            'mobile_number' => ['nullable', 'regex:/^\+(?:[0-9] ?){6,14}[0-9]$/'],
            'birth_date' => ['nullable', 'date_format:Y-m-d'],
            'local_lang' => ['nullable', 'in:' . implode(',', Functions::getAvailableLanguages())],
            'country' => ['nullable', 'exists:countries,_id'],
            'state' => ['nullable', 'exists:states,_id'],
            'city' => ['nullable', 'exists:cities,_id'],
            'address' => ['nullable', 'min:10', 'max:512'],
            'avatar' => ['nullable', 'image', 'max:6144'],
            'roles' => ['array'],
            'awario_profile_hash' => ['string'],
            'roles' => ['nullable', 'array'],
        ];
    }
}
