<?php

namespace App\Http\Requests\Admin\AdminRoles;

use App\Helper\Functions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:60'],
            'slug' => ['required', 'string', 'max:255', Functions::getSlugValidation(), Rule::unique('admin_roles')],
            'permissions' => ['nullable', 'array'],
        ];
    }
}
