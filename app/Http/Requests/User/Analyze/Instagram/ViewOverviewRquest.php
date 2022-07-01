<?php

namespace App\Http\Requests\User\Analyze\Instagram;

use Illuminate\Foundation\Http\FormRequest;

class ViewOverviewRquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return appUser()->can('analyze.instagram.view-overview');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
