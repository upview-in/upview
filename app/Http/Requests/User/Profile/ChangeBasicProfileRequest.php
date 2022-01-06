<?php

namespace App\Http\Requests\User\Profile;

use App\Helper\Functions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ChangeBasicProfileRequest extends FormRequest
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
            'email' => ['sometimes', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user())],
            'mobile_number' => ['nullable', 'regex:/^\+(?:[0-9] ?){6,14}[0-9]$/'],
            'birth_date' => ['nullable', 'date_format:Y-m-d'],
            'local_lang' => ['sometimes', 'in:' . implode(',', Functions::getAvailableLanguages())],
        ];
    }
}
