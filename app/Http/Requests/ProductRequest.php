<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
        if($this->get('productid')){ 
            $xx = ','.$this->get('productid'); 
            $yy = '';
        }else{ 
            $xx = ''; 
            $yy = 'required|';
        }
        $x = [
            'producttype'               =>  'required|max:255|string',
            'showas'                    =>  'required|max:255|string',
            'department'                =>  'required|max:255|string',
            'category'                  =>  'required|max:255|string',
            'brand'                     =>  'required|max:255|string',
            'availability'              =>  'required|max:255|string',
            'includes'                  =>  'required|max:255|string',
            'code'                      =>  'required|unique:products,code'.$xx.'|string',
            'userName'                  =>  'required|max:255|string',
//            'description'               =>  'required|max:255|string',
//            'salesunit'                 =>  'required|max:255|string',
            /*'color'                     =>  'required|max:255|string',
            'alto'                      =>  'required|max:255|string',
            'width'                     =>  'required|max:255|string',
            'long'                      =>  'required|max:255|string',
            'Weight'                    =>  'required|max:255|string',
            'additional_information'    =>  'required|max:255|string',
            'deleveryfrom'              =>  'required|max:255|string',
            'deleveryto'                =>  'required|max:255|string',
            'deleverycondition'         =>  'required|max:255|string',*/
//            'provider'                  =>  'required|max:255|string',
//            'catalogue'                 =>  'required|max:255|string',
           // 'nopage'                    =>  'required|max:255|string',
           // 'productcode'               =>  'required|max:255|string',
           // 'keywords'                  =>  'required|max:255|string',
            'mainimage'                 =>  $yy.'image',
            //'files'                     =>  'required|image',
        ];
        
        $y = $this->PriceRules();
        
        
        return array_merge($x,$y);
    }
    
    public function messages()
    {
        $x = [
            'producttype.required'               =>  'Product type is required',
            'showas.required'                    =>  'Show as is required',
            'department.required'                =>  'Department is required',
            'category.required'                  =>  'Category is required',
            'brand.required'                     =>  'Brand is required',
            'availability.required'              =>  'Availability is required',
            'includes.required'                  =>  'Includes is required',
            'code.required'                      =>  'Code is required',
            'code.unique'                       =>  'Product Code shulod be unique',
            'userName.required'                  =>  'User Name is required',
            'description.required'               =>  'Description is required',
            'salesunit.required'                 =>  'Sales unit is required',
            
           /* 'color.required'                     =>  'Color is required',
            'alto.required'                      =>  'Alto is required',
            'width.required'                     =>  'Width is required',
            'long.required'                      =>  'Lenght is required',
            'Weight.required'                    =>  'Weight is required',
            'additional_information.required'    =>  'Additional Information is required',
            'deleveryfrom.required'              =>  'From is required',
            'deleveryto.required'                =>  'To is required',
            'deleverycondition.required'         =>  'Delevery Condition is required',*/
            'provider.required'                  =>  'Provider is required',
            'catalogue.required'                 =>  'Catalogue is required',
           // 'nopage.required'                    =>  'No page is required',
           // 'productcode.required'               =>  'Product Code is required',
           // 'keywords.required'                  =>  'Keywords are required',
            'mainimage.required'                 =>  'Primay Image is required',
           // 'files.required'                     =>  'Galley is required',
            'mainimage.image'                    =>  'Primay Image must be image type',
           // 'files.image'                        =>  'Galley is  must be image type',
        ];
        
        $y = $this->PriceMessage();
        
        
        return array_merge($x,$y);
    }
    
    public function format_array($array) {
        $return_array = array();
        $array = array_reverse($array);
        foreach ($array as $key => $value) {
            foreach ($value as $k => $v) {
                $return_array[$k] = $v;
            }
        }
        return $return_array;
    }
    
    public function PriceRules() {
        $m = $this->get('noofinput');
        $n;
        while ($m > 0) {
            $n[$m] = [
                    'measures_'.$m      =>  'required',
                    'normalprice_'.$m   =>  'required',
                    'publicprice_'.$m   =>  'required',
                ];
            $m--;
        }
        $n = $this->format_array($n);
        return $n;
    }
    
    public function PriceMessage() {
        $m = $this->get('noofinput');
        $n;
        while ($m > 0) {
            $n[$m] = [
                    'measures_'.$m.'.required'      =>  'Measure is required',
                    'normalprice_'.$m.'.required'   =>  'Normal price is required',
                    'publicprice_'.$m.'.required'   =>  'Public price is required',
                ];
            $m--;
        }
        $n = $this->format_array($n);
        return $n;
    }
}
