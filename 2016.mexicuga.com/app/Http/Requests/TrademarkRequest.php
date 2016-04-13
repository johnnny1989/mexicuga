<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrademarkRequest extends Request
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
        if($this->get('trademarkid')){
            return [
                'trademark'      =>  'required|max:255|string|unique:trademark,name,'.$this->get('trademarkid'),
            ];
        }else{
            return [
                'trademark'      =>  'required|max:255|string|unique:trademark,name',
            ];
        }
    }
    
    public function messages()
    {
        return [
            'trademark.required'     =>  'Trademark is requried',
            'trademark.unique'       =>  'Trademark already exists',
        ];
    }
}
