<?php

namespace App\Http\Requests\Admin\Users;

use App\Helper\Functions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'min:2', 'max:20'],
            'email' => ['sometimes', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'mobile_number' => ['nullable', 'regex:/^\+(?:[0-9] ?){6,14}[0-9]$/'],
            'birth_date' => ['nullable', 'date_format:Y-m-d'],
            'local_lang' => ['sometimes', 'in:' . implode(',', Functions::getAvailableLanguages())],
            'new_password' => ['sometimes', 'same:confirm_new_password', Password::min(8)],
            'country' => ['sometimes', 'exists:countries,_id'],
            'state' => ['sometimes', 'exists:states,_id'],
            'city' => ['nullable', 'exists:cities,_id'],
            'address' => ['nullable', 'min:10', 'max:512'],
            'avatar' => ['sometimes', 'image', 'max:6144'],
            'enabled' => ['sometimes', 'in:true,false'],
            'verified' => ['sometimes', 'in:true,false'],
        ];
    }
}
