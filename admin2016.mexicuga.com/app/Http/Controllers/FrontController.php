<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Banner;
use App\WebConfig;
use App\Product;
use App\ProductImages;
use App\ProductPrice;
use App\Category;
use App\GEOIP;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index() {
        $view = view('front.pages.home');
        $view->banners = Banner::all();
        $view->webconfig = WebConfig::find(1);
        return $view;
    }
    
    protected function CheckUser() {
        
        if(Auth::check()){
            if(Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'operator'){
                return redirect('/admin/dashboard');
            }else if(Auth::user()->usertype == 'user') {
                Auth::logout();
                return redirect('/')->with('error','Invalid Credentials');
            }
        }
    }
    
    public function adminlogin() {
        if(Auth::check()){
           $view = view('admin.pages.dashboard');
           return $view;
        }else{
           $view = view('admin.pages.login');
           return $view;
        }
    }
    
    public function login() {
        $this->CheckUser();
        $view = view('front.pages.login');
        return $view;
    }
    
    public function register() {
        $this->CheckUser();
        $view = view('front.pages.register');
        return $view;
    }
    
    public function forgerpassword() {
        $this->CheckUser();
        $view = view('front.pages.passwordrecovery');
        return $view;
    }
    
    public function Pdesc($department,$category,$product) {
        // get productcode
        $code = array_reverse(explode('-', $product))[0];
        $view = view('front.pages.product_description');
        $view->product = Product::where(['code' => $code])
                        ->join('category', 'products.category_id', '=', 'category.id')  
                        ->join('department', 'products.department_id', '=', 'department.id')
                        ->join('trademark', 'products.brand_id', '=', 'trademark.id')
                        ->join('units', 'products.salesunit', '=', 'units.id')
                        ->select('products.*','category.category as category','department.department as department','trademark.name as trademark','units.name as unitname')
                        ->first();
        $rpro = explode(",",str_replace(' ', '', $view->product->productcode));
        $view->relatedproduct = Product::whereIn('code',$rpro )
                ->join('category', 'products.category_id', '=', 'category.id')  
                        ->join('department', 'products.department_id', '=', 'department.id')
                        ->join('trademark', 'products.brand_id', '=', 'trademark.id')
                        ->join('units', 'products.salesunit', '=', 'units.id')
                        ->select('products.*','category.category as category','department.department as department','trademark.name as trademark','units.name as unitname')
                ->get();
        $view->gallery = ProductImages::where(['product_id'=> $view->product->id,'primary' => 0])->get();
        $view->prices  = ProductPrice::where('product_id',$view->product->id)->get();
        $view->department = \App\Department::find($view->product->department_id)->department;
        $view->category = \App\Category::find($view->product->category_id);
        return $view;
    }
    
    public function SetBrand($catid) {
        if(session('brand') != '*'){
            return [['category_id',$catid],['brand_id',session('brand')],['producttype','!=','MexiPuntos']];
        }else{
            return [['category_id',$catid],['producttype','!=','MexiPuntos']];
        }
    }
    
    public function Category($department,$category) {
        session(['brand' => '*']);
        session(['category' => $category]);
        session(['takeit' => 16]);
        
        $category = str_replace('-', ' ', $category);
        $category = Category::where(["category" => $category])->select('id','category')->first();
        $column = session('name')?session('name'):'userName';
        $sortby = session('sortby')?session('sortby'):'asc';
        $brand  = session('brand')?session('brand'):'*';
        $view = view('front.pages.category');
        $view->products = Product::where($this->SetBrand($category->id))
                          ->join('category', 'products.category_id', '=', 'category.id')  
                          ->join('department', 'products.department_id', '=', 'department.id')
                          ->join('trademark', 'products.brand_id', '=', 'trademark.id')
                          ->select('products.*','category.category as category','category.id as categoryid','department.department as department','trademark.name as trademark')
                          ->orderBy($column, $sortby)->take(session('takeit'))
                          ->get();
        $view->category = Category::all();
        $view->marcas = \App\TradeMark::all();
        $view->catg      =   $category;
        $view->department = $department;
        
        session(['rowsavailable' => Product::where($this->SetBrand($category->id))->count()]);
        
        return $view;
    }
    
    
    
    public function pages($page = '') {
        if($page == ''){
            $view = $this->index();
        }else if($page == 'mexipuntos'){
            $view = view('front.pages.mexipuntos');
            $view->products = Product::where(['producttype' => 'MexiPuntos'])
                              ->join('category', 'products.category_id', '=', 'category.id')  
                              ->join('department', 'products.department_id', '=', 'department.id')
                              ->join('trademark', 'products.brand_id', '=', 'trademark.id')
                              ->select('products.*','category.category as category','department.department as department','trademark.name as trademark')
                              ->get(); 
        }else if($page == 'producto_descripcion'){
            $view = view('front.pages.product_description');
        }else if($page == 'ofertas'){
            $view = view('front.pages.ofertas');
        }else if($page == 'productos_nuevos'){
            $view = view('front.pages.productos_nuevos');
        }else if($page == 'terminos-condiciones-uso'){
            $view = view('front.pages.terminos-condiciones-uso');
        }else if($page == 'contacto'){
            $view = view('front.pages.contact');
        }else if($page == 'preguntas-frecuentes'){
            $view = view('front.pages.preguntas-frecuentes');
        }else if($page == 'usercheck'){
            $this->CheckUser();
        }else{
            $view = view('errors.404');
        }
        return $view;
    }
    
    
    public function GetAddress($zip) {
        $content = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$zip.'&sensor=true');
        $content = json_decode($content);
        $str = $content->results[0]->address_components;
        $arr;
        //echo '<pre>';
        foreach ($str as $key => $value) {
            if($value->types[0] === 'postal_code'){
                $arr['postal_code'] = $value->long_name;
            }
            if($value->types[0] === 'locality'){
                $arr['locality'] = $value->long_name;
            }
            if($value->types[0] === 'administrative_area_level_2'){
                $arr['administrative_area_level_2'] = $value->long_name;
            }            
            if($value->types[0] === 'administrative_area_level_1'){
                $arr['administrative_area_level_1'] = $value->long_name;
            }
            if($value->types[0] === 'country'){
                $arr['country'] = $value->long_name;
            }
        }
        
        if($arr['country'] == 'Mexico'){
            echo json_encode($arr);
        }else{
            echo 0;
        }   
        
    }
    
    
    
    public function ProductList() {
        $category = str_replace('-', ' ', session('category'));
        $category = Category::where(["category" => $category])->select('id','category')->first();
        $column = session('name')?session('name'):'userName';
        $sortby = session('sortby')?session('sortby'):'asc';
        $brand  = session('brand')?session('brand'):'*';
        $view = view('front.pages.productlist');
        
        $view->products = Product::where($this->SetBrand($category->id))
                          //->join('productprice', 'products.id', '=', ProductPrice::where('product_id','products.id')->first())
                          ->join('category', 'products.category_id', '=', 'category.id')  
                          ->join('department', 'products.department_id', '=', 'department.id')
                          ->join('trademark', 'products.brand_id', '=', 'trademark.id')
                          ->select('products.*','category.category as category','category.id as categoryid','department.department as department','trademark.name as trademark')
                          ->orderBy($column, $sortby)->take(session('takeit'))
                          ->get();
        return $view;
    }
    
    
    public function Search() {
        session(['takeit' => 16]);
        $column = session('name')?session('name'):'userName';
        $sortby = session('sortby')?session('sortby'):'asc';
        $brand  = session('brand')?session('brand'):'*';
        $view = view('front.pages.resultados-busquedas');
        $view->products = Product::where('userName','like',  '%'.strip_tags(Input::get('Search')).'%')
                          ->orWhere('additional_information','like',  '%'.strip_tags(Input::get('Search')).'%')
                          ->orWhere('description','like',  '%'.strip_tags(Input::get('Search')).'%')
                          ->orWhere('productcode','like',  '%'.strip_tags(Input::get('Search')).'%')
                          ->join('category', 'products.category_id', '=', 'category.id')  
                          ->join('department', 'products.department_id', '=', 'department.id')
                          ->join('trademark', 'products.brand_id', '=', 'trademark.id')
                          ->select('products.*','category.category as category','category.id as categoryid','department.department as department','trademark.name as trademark')
                          ->orderBy($column, $sortby)->take(session('takeit'))
                          ->get();
        $view->category = Category::all();
        $view->marcas = \App\TradeMark::all();
        $view->searched =  strip_tags(Input::get('Search'));
        
        return $view;
        
    }
    
    public function sitemap() {
        $view = view('front.pages.mapa-sitio');
        $view->department = \App\Department::all();
        return $view;
    }
    
}
