<?php

namespace App\Http\Requests\User\Support;

use App\Models\UserSupportQuery;
use Illuminate\Foundation\Http\FormRequest;

class UserQueryRequest extends FormRequest
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
            'query_title' => ['required'],
            'query_description' => ['required'],
            'attachments' => ['sometimes', 'array', 'max:' . UserSupportQuery::$attachmentsMaxFiles],
            'attachments.*' => ['sometimes', 'file', 'mimetypes:' . implode(',', UserSupportQuery::$attachmentsAcceptMimes), 'max:' . (1024 * UserSupportQuery::$attachmentsMaxFileSize)],
        ];
    }
}
