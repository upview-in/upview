<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:60'],
            'blogDescription' => ['required', 'string', 'max:' . (1024 * 1)],
            'blogHtmlPage' => ['required', 'string'],
            'poster' => ['required', 'image', 'max:' . (1024 * 12)],
        ];
    }
}
