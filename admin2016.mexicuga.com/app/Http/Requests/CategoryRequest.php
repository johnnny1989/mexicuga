<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
        if($this->get('categoryid')){
            return [
                'Category'      =>  'required|max:255|string|unique:category,category,'.$this->get('categoryid'),
                'Department'    =>  'exists:department,id',
                'ImageNormal'   =>  'image',
                'ImageSmall'    =>  'image',
            ];
        }else{
            return [
                'Category'      =>  'required|max:255|string|unique:category,category',
                'Department'    =>  'exists:department,id',
                'ImageNormal'   =>  'image',
                'ImageSmall'    =>  'image',
            ];
        }
    }
    
    public function messages()
    {
        return [
            'Category.required'     =>  'Category is requried',
            'Category.unique'       =>  'Category already exists',
            'Department.required'   =>  'Department is requried',
            'Department.exists'     =>  'Please select Department',
            'ImageNormal.image'     =>  'Please upload a valid image',
            'ImageSmall.image'      =>  'Please upload a valid image',
        ];
    }
    
}
