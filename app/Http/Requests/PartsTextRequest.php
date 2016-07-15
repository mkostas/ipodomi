<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PartsTextRequest extends Request
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
            'part_category' => 'required|int',
            'content' => 'required|string',
            'company_category' => 'required|int',
            'lang' => 'required|int',
        ];
    }
}
