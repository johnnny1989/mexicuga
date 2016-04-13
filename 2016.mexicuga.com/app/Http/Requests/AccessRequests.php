<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccessRequests extends Request
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
        if($this->get('userid')){
            return [
                'usertype'      =>  'required',
                'email'         =>  'required|email|unique:users,email,'.$this->get('userid'),
                'password'      =>  'confirmed',
                'name'          =>  'required'
                
            ];
        }else{
            return [
                'usertype'      =>  'required',
                'email'         =>  'required|email|unique:users,email',
                'password'      =>  'required|confirmed',
                'password_confirmation'      =>  'required',
                'name'          =>  'required'
            ];
        }
    }
    
    public function messages()
    {
        return [
            'usertype.required'     =>  'Category is requried',
            'email.exists'          =>  'User Already Exists',
            'password.required'     =>  'Password is requried',
            'password.confirmed'    =>  'Password and Confirm Password doesn\'t match',
            'password_confirmation.required'    =>  'Confirm Password is required',
            'name.required'         =>  'Name is required'
        ];
    }
}
