<?php

namespace App\Http\Requests\Admin\UserRoles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'min:2', 'max:60'],
            'slug' => ['sometimes', 'string', 'max:255', Rule::unique('user_roles')->ignore($this->userRole)],
            'enabled' => ['sometimes', 'in:true,false'],
            'permissions' => 'array',
        ];
    }
}
