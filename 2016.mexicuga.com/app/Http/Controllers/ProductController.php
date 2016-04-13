<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\TestRequest;
use App\Product;
use App\ProductPrice;
use App\ProductImages;
use App\Department;
use App\Category;
use App\TradeMark;
use App\Providers;
use App\Catalogue;
use App\Units;
use App\Common;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.productos_add');
        $view->departments   =   Department::all(['id','department']);
        $view->categories    =   Category::all(['id','category']);
        $view->brands        =   TradeMark::all(['id','name']);
        $view->providers     =   Providers::all(['id','company']);
        $view->catalogues    =   Catalogue::all(['id','name']);
        $view->units         =   Units::all(['id','name']);
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.productos_view');
        $view->departments   =   Department::all(['id','department']);
        $view->categories    =   Category::all(['id','category']);
        $view->brands        =   TradeMark::all(['id','name']);
        $view->products      =    Product::join('units', 'products.id', '=', 'units.id')
                                 ->select('products.*', 'units.name as unitname')->get();                                
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.productos_edit');
        $view->departments   =   Department::all(['id','department']);
        $view->categories    =   Category::all(['id','category']);
        $view->brands        =   TradeMark::all(['id','name']);
        $view->providers     =   Providers::all(['id','company']);
        $view->catalogues    =   Catalogue::all(['id','name']);
        $view->units         =   Units::all(['id','name']);
        $view->product       =   Product::find($id);
        $view->productprice  =   ProductPrice::where('product_id',$id)->get();
        $view->primeimage    =   ProductImages::where(['primary'=>1,'product_id'=>$id])->first();
        $view->gallery       =   ProductImages::where(['primary'=>0,'product_id'=>$id])->get();
        return $view;
    }
    
    public function create(ProductRequest $request) {
        
        // insert values in product table
        $pro = new Product;
        $pro->producttype       =   $request->producttype;
        $pro->showas            =   $request->showas;
        $pro->department_id     =   $request->department;
        $pro->category_id       =   $request->category;
        $pro->brand_id          =   $request->brand;
        $pro->availability      =   $request->availability;
        $pro->includes          =   $request->includes;
        $pro->code              =   $request->code;
        $pro->userName          =   $request->userName;
        $pro->description       =   $request->description;
        $pro->salesunit         =   $request->salesunit;
        $pro->color             =   $request->color;
        $pro->alto              =   $request->alto;
        $pro->width             =   $request->width;
        $pro->long              =   $request->long;
        $pro->Weight            =   $request->Weight;
        $pro->additional_information   =   $request->additional_information;
        $pro->deleveryfrom      =   $request->deleveryfrom;
        $pro->deleveryto        =   $request->deleveryto;
        $pro->deleverycondition =   $request->deleverycondition;
        $pro->provider_id       =   $request->provider;
        $pro->catalogue_id      =   $request->catalogue;
        $pro->nopage            =   $request->nopage;
        $pro->productcode       =   $request->productcode;
        $pro->keywords          =   $request->keywords;
        $imagename              =   Common::ImageUpload($request->file('mainimage'),'product');
        $pro->imagename         =   $imagename;
        $price->measures        =   $request->input('measures_1');
        $price->normal_price    =   $request->input('normalprice_1');
        $price->public_price    =   $request->input('publicprice_1');
        $price->discount        =   $request->input('discount_1');
        $pro->save();
        
        //insert values in product price table
        $x = $request->noofinput;
        for($n = 1; $n <= $x; $n++){
            if(
                $request->input('measures_'.$n) != '0' ||
                $request->input('normalprice_'.$n) != '0.00' ||
                $request->input('publicprice_'.$n) != '0.00' ||
                $request->input('discount_'.$n) != '0'
            ){
                $price = new ProductPrice;
                $price->product_id      =   $pro->id;
                $price->measures        =   $request->input('measures_'.$n);
                $price->normal_price    =   $request->input('normalprice_'.$n);
                $price->public_price    =   $request->input('publicprice_'.$n);
                $price->discount        =   $request->input('discount_'.$n);
                $price->save();
                $x--;
            }
        }
        
        // insert value in product images
            $image = new ProductImages;
            $image->product_id      =  $pro->id;
            $image->imagename       =  $imagename; 
            $image->primary         =  1;
            $image->save();
        
        if($request->hasFile('files')){
            $files = $request->file('files');

            foreach($files as $file) {
               $image               = new ProductImages;
               $image->product_id   =   $pro->id;
               $image->imagename    =   Common::ImageUpload($file,'product/gallery');
               $image->primary      =   0;
               $image->save();
            }     
        }
        session(['status' => 'Saved Successfully']);
    }
    
    public function update(ProductRequest $request) {
        
        $pro = Product::find($request->productid);
        $pro->producttype       =   $request->producttype;
        $pro->showas            =   $request->showas;
        $pro->department_id     =   $request->department;
        $pro->category_id       =   $request->category;
        $pro->brand_id          =   $request->brand;
        $pro->availability      =   $request->availability;
        $pro->includes          =   $request->includes;
        $pro->code              =   $request->code;
        $pro->userName          =   $request->userName;
        $pro->description       =   $request->description;
        $pro->salesunit         =   $request->salesunit;
        $pro->color             =   $request->color;
        $pro->alto              =   $request->alto;
        $pro->width             =   $request->width;
        $pro->long              =   $request->long;
        $pro->Weight            =   $request->Weight;
        $pro->additional_information   =   $request->additional_information;
        $pro->deleveryfrom      =   $request->deleveryfrom;
        $pro->deleveryto        =   $request->deleveryto;
        $pro->deleverycondition =   $request->deleverycondition;
        $pro->provider_id       =   $request->provider;
        $pro->catalogue_id      =   $request->catalogue;
        $pro->nopage            =   $request->nopage;
        $pro->productcode       =   $request->productcode;
        $pro->keywords          =   $request->keywords;
        $price->measures        =   $request->input('measures_1');
        $price->normal_price    =   $request->input('normalprice_1');
        $price->public_price    =   $request->input('publicprice_1');
        $price->discount        =   $request->input('discount_1');
        if($request->hasFile('mainimage')){
            $imagename          =   Common::ImageUpload($request->file('mainimage'),'product');
            $pro->imagename     =   $imagename;
        }
        $pro->save();
        
        //insert values in product price table
        ProductPrice::where(['product_id' => $request->productid ])->delete();
        $x = $request->noofinput;
        
    
        for($n = 1; $n <= $x; $n++){
            if(
                $request->input('measures_'.$n) != '0' ||
                $request->input('normalprice_'.$n) != '0.00' ||
                $request->input('publicprice_'.$n) != '0.00' ||
                $request->input('discount_'.$n) != '0'
            ){
                $price = new ProductPrice;
                $price->product_id      =   $request->productid;
                $price->measures        =   $request->input('measures_'.$n);
                $price->normal_price    =   $request->input('normalprice_'.$n);
                $price->public_price    =   $request->input('publicprice_'.$n);
                $price->discount        =   $request->input('discount_'.$n);
                $price->save();
            }
        }
        
        // insert value in product images
        if($request->hasFile('mainimage')){
            $image = ProductImages::find(['product_id' => $request->productid, 'primary' => 1 ]);
            $image->imagename       =  $imagename;
            $image->save();
        }
        
        if($request->hasFile('files')){
            $files = $request->file('files');

            foreach($files as $file) {
               $image               = new ProductImages;
               $image->product_id   =   $pro->id;
               $image->imagename    =   Common::ImageUpload($file,'product/gallery');
               $image->primary      =   0;
               $image->save();
            }
        }
        
        session(['status' => 'Saved Successfully']);
    }
    
    
    public function delete($id) {
        $img = ProductImages::where(['product_id' => $id,'primary' => 0])->get();
        foreach ($img as $key => $value) {
            Common::Removefile($value->imagename, 'product/gallery');
        }
        $img = ProductImages::where(['product_id' => $id,'primary' => 1])->first();
            Common::Removefile($img->imagename, 'product');
            ProductImages::where(['product_id' => $id])->delete();
            ProductPrice::where(['product_id' => $id])->delete();
        $x = Product::where('id',$id)->delete();
        if($x){ echo 1; }else{ echo 0;}
    }
    
    
    public function deletegallery($id) {
        $img = ProductImages::find($id);
        Common::Removefile($img->imagename, 'product/gallery');
        $x = ProductImages::where('id',$id)->delete();
        if($x){ echo 1; }else{ echo 0;}
    }
    
}
