<?php

namespace App\Http\Requests\Api\Youtube\Channel;

use Illuminate\Foundation\Http\FormRequest;

class GetMineChannelAnalytics extends FormRequest
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
            'startDate' => 'required|date_format:Y-m-d|before:endDate',
            'endDate' => 'required|date_format:Y-m-d|after:startDate',
            'dimensions' => 'sometimes|in:day,month',
            'sort' => 'sometimes|in:day,month',
        ];
    }
}
