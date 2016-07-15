<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompletedApplicationRequest extends Request
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
            'filepath' => 'required|string',
            'school' => 'required|int',
            'company_category' => 'required|int',
            'lang' => 'required|int',
        ];
    }
}
