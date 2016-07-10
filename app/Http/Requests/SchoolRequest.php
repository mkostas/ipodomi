<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SchoolRequest extends Request
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
            'country_id' => 'required|int',
            'city' => 'required|string',
            'name' => 'required|string',
            'contact_person' => 'string',
            'email' => 'string',
            'phones' => 'string',
            'fax' => 'string',
            'cancelled' => 'boolean',
            'not_submitted' => 'boolean',
            'sent_section' => 'string'
        ];
    }
}