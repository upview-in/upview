<?php

namespace App\Http\Requests\Admin\UserPermissions;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:60'],
            'slug' => ['required', 'string', 'max:255', Functions::getSlugValidation(), Rule::unique('user_permissions')],
            'enabled' => ['sometimes', 'in:true,false'],
        ];
    }
}
