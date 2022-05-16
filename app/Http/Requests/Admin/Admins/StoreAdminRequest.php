<?php

namespace App\Http\Requests\Admin\Admins;

use App\Helper\Functions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'username' => ['required', 'string', 'min:2', 'max:80', 'regex:/(^([a-zA-Z_]+)(\d+)?$)/u', Rule::unique('admins')],
            'password' => ['required', 'same:confirm_password', Password::min(8)],
            'local_lang' => ['nullable', 'in:' . implode(',', Functions::getAvailableLanguages())],
            'avatar' => ['nullable', 'image', 'max:6144'],
            'roles' => ['nullable', 'array'],
        ];
    }
}
