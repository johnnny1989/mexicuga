<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\ProductPrice;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use LaraCart;
class Search extends Model
{
    public static function Category($department,$search,$category_id=''){
        $ss = str_replace(" ","%20",$search);
        $department_id = \App\Department::whereDepartment($department)->pluck('id')->first();
        $category = \App\Category::whereDepartmentId($department_id)->get();
        $html = '<div class="col-md-3">';
        $html .= '<p><strong><i class="fa fa-th-large"></i> Categorías</strong> <select class="form-control" id="categorysort"';
        $html .= "onchange='ChangeCategorySearch(\"$department\",\"$search\")'>";
        foreach($category as $key => $cat){
            $html .= '<option ';
            if($category_id == $cat->id) { $html .= "selected"; }
            $html .=' value="'.($cat->category).'">'.$cat->category.'</option>';
        }
        $html .= '</select></p><br></div>';
        echo $html;
    }
}
//@if(isset($department_id) && $department_id == $depart->id) {{ "selected" }} @endif