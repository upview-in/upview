<?php

namespace App\Http\Requests\User\Analyze\YouTube;

use Illuminate\Foundation\Http\FormRequest;

class ViewVideosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return appUser()->can('analyze.youtube.view-videos');
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
