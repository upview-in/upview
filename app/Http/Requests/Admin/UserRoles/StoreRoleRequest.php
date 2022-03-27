<?php

namespace App\Http\Requests\Admin\UserRoles;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|string|max:60',
            'slug' => 'required|string|max:255|unique:user_roles',
            'price' => 'required|integer',
            'permissions' => 'array',
        ];
    }
}
