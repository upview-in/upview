<?php

namespace App\Http\Requests\User\Profile;

use App\Rules\old_password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => ['required', new old_password(), Password::min(8)],
            'new_password' => ['required', 'same:confirm_new_password', Password::min(8)],
        ];
    }
}
