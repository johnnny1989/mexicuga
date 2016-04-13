<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CatalogueRequest extends Request
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
        if($this->get('catalogueid')){
            return [
                'catalogue'      =>  'required|max:255|string|unique:catalogue,name,'.$this->get('catalogueid'),
            ];
        }else{
            return [
                'catalogue'      =>  'required|max:255|string|unique:catalogue,name',
            ];
        }
    }
    
    public function messages()
    {
        return [
            'catalogue.required'     =>  'Catalogue is requried',
            'catalogue.unique'       =>  'Catalogue already exists',
        ];
    }
}
