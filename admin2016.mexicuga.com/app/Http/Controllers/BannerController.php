<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;
use App\Banner;
use App\WebConfig;
use App\Common;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.banners_view');
        $view->banners = Banner::orderBy('orderset', 'asc')->get();
        $view->frontimgs = WebConfig::where('id',1)->first();
        $view->nosban = count($view->banners);
        return $view;
    }
   
    public function save(Request $request) {
        $validation = Validator::make($request->all(), [
            'ImageFile'  => 'required|image',
            'ImageLink'  => 'url',
            'ImageDescription' => 'string'
        ]);

       if($validation->passes()){           
           $vals = new Banner;
           $vals->imagename = Common::ImageUpload($request->ImageFile, 'bannerimage');
           $vals->imageurl  = $request->ImageLink;
           $vals->imagedescription  =   $request->ImageDescription;
           if($vals->save()){
               $order = Banner::find($vals->id);
               $order->orderset = $vals->id;
               $order->save();
              return redirect('admin/banners_view')->withMessage('Banner image uploaded');
           }else{
               return redirect('admin/banners_view')->withErrors($validator, 'error');
           }
       }
      
    }
    
    public function delete($id) {
        $filename = Banner::find($id);
        $x = Banner::where('id',$id)->delete();
        if($x){
            Common::Removefile($filename->imagename, 'bannerimage');
            echo 1;
        }else{ echo 0; }
    }
    
    
    public function SaveFrontofferImg(Request $request) {
        $validation = Validator::make($request->all(), [
            'FrontImage'  => 'required|image',
            'formtype'  => 'required',
            '_token'    =>  'required'
        ]);
        if($validation->passes()){
           
           $filename  = Common::ImageUpload($request->FrontImage, 'frontimage');
           
           $vals = WebConfig::firstOrCreate(['id' => 1]);
           
           if($request->formtype === 'BANNERLONUEVO'){
            $vals->nuevo = $filename;
           }elseif($request->formtype === 'OFERTAS'){
            $vals->ofertas = $filename;
           }elseif($request->formtype === 'MEXIPUNTOS'){
            $vals->maxipuntos = $filename;
           }elseif($request->formtype === 'MAYOREO'){
            $vals->mayoreo = $filename; 
           }
           
           $vals->save();
        }else{
           echo 'fail';
        }
        
    }
    
    
    public function SetOrder($id,$direction) {
        $banner = Banner::where(['id' => $id])->first();
        
        if($direction === 'up'){
            // get previous id
            if($banner->orderset >=1)
            {
                $banner_orderset=$banner->orderset;
                $new_orderset=$banner_orderset-1;
                Banner::where("orderset",$new_orderset)->update(array("orderset"=>$banner_orderset));
                Banner::where("id",$id)->update(array("orderset"=>$new_orderset));
            }
//            $getid = Banner::where('orderset', '<', $banner->orderset)->orderBy('orderset', 'desc')->take(1)->first();
            // update pevious id
//            $this->updatebanner($getid->id,$banner->orderset);
            // update current id
//            $this->updatebanner($banner->id,$getid->orderset);
            
        }elseif($direction === 'down'){
            if($banner->orderset >=1)
            {
                $banner_orderset=$banner->orderset;
                $new_orderset=$banner_orderset+1;
                Banner::where("orderset",$new_orderset)->update(array("orderset"=>$banner_orderset));
                Banner::where("id",$id)->update(array("orderset"=>$new_orderset));
            }
            // get next id
//            $getid = Banner::where('orderset', '>', $banner->orderset)->orderBy('orderset', 'asc')->take(1)->first();
//            // update pevious id
//            $this->updatebanner($getid->id,$banner->orderset);
//            // update current id
//            $this->updatebanner($banner->id,$getid->orderset);
        }
        //print_r($getid->orderset);
    }
    
    public function updatebanner($id,$getid) {
            $x  = Banner::find($id);
            $x->orderset  = $getid;
            $x->save();
    }
}
