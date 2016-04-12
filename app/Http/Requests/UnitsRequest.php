<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UnitsRequest extends Request
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
        if($this->get('unitid')){
            return [
                'unit'      =>  'required|max:255|string|unique:units,name,'.$this->get('unitid'),
            ];
        }else{
            return [
                'unit'      =>  'required|max:255|string|unique:units,name',
            ];
        }
    }
    
    public function messages()
    {
        return [
            'unit.required'     =>  'Unit is requried',
            'unit.unique'       =>  'Unit already exists',
        ];
    }
}
