<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentRequest extends Request
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
        if($this->get('departmentid')){
            return [
                'Department'    =>  'required|max:255|string|unique:department,department,'.$this->get('departmentid'),
                'ImageNormal'   =>  'image',
                'ImageSmall'    =>  'image',
            ];
        }else{
            return [
                'Department'    =>  'required|max:255|string|unique:department,department',
                'ImageNormal'   =>  'image',
                'ImageSmall'    =>  'image',
            ];
        }
    }
    
    public function messages()
    {
        return [
            'Department.required' =>  'Department is requried',
            'Department.unique'   =>  'Department already exists',
            'ImageNormal.image'   =>  'Please upload a valid image',
            'ImageSmall.image'    =>  'Please upload a valid image',
        ];
    }
}
