<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProvidersRequest extends Request
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
            'company'       =>  'max:255|string',
            'personname'    =>  'required|max:255|string',
            'phonetype'     =>  'required|max:255|string',
            'phoneno'       =>  'max:255|string',
            'email'         =>  'email',
            'website'       =>  'string',
            'comments'      =>  'max:255',
        ];
    }
    
    public function messages()
    {
        return [
            'company.string'        =>  'Enter valid company name',
            'personname.required'   =>  'Person name is required',
            'phonetype.required'    =>  'Type is required',
            'phoneno.required'      =>  'Phone no. is required',
            'email.email'           =>  'Enter valid email address',
            'website.string'           =>  'Enter valid website url',
            'comment.max'           =>  'Please provide valid comment',
        ];
    }
}
