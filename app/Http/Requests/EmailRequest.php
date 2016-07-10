<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmailRequest extends Request
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
            'school_id' => 'required|integer',
            'email_from' => 'required|string',
            'email_to' => 'required|string',
            'subject' => 'string',
            'content' => 'required',
            'comments' => ''
        ];
    }
}