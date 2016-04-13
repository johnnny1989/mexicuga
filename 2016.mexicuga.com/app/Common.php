<?php

namespace App;
use Auth;
use Image;
use App\Department;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    public static function CurrentUrl($url,$slugs = array()) {
        $url = str_replace(url('admin').'/','',$url);
        if(in_array($url, $slugs)){
            return 'active';
        }
    }
    
    public static function ImageUpload($image,$folder) {
        $image = Image::make($image);
        $filename  = date('Ymdhisu').rand(9999,99999). '.' . explode('/', $image->mime())[1];
        if(!is_dir(public_path('images/'.$folder))){ mkdir(public_path('images/'.$folder), 0777, true); }
        $path = public_path('images/'.$folder.'/'.$filename);
        $image->save($path);
        return $filename;
    }
    public static function ProductImageUpload($image,$folder) {
        $image = Image::make($image);
        $filename  = date('Ymdhisu').rand(9999,99999). '.' . explode('/', $image->mime())[1];
        if(!is_dir(public_path('images/'.$folder))){ mkdir(public_path('images/'.$folder), 0777, true); }
        $path = public_path('images/'.$folder.'/'.$filename);
        $image->save($path);
        return $filename;
    }
    
    public static function Removefile($image,$folder) {
        if(file_exists(public_path('images/'.$folder.'/' . $image))){
            unlink(public_path('images/'.$folder.'/' . $image));
        }
    }
    
    public static function ProductUrl($department,$category,$name,$trademark,$code) {
        $url  = str_slug($department).'/';
        $url .= str_slug($category).'/';
        $url .= str_slug($name);
        $url .= str_replace(' ','',strtolower($trademark)).'-';
        $url .= str_replace(' ','',strtolower($code));
        return url('product/'.$url);
    }
    
    public static function MainMenu() {
        $menu  = '<ul class="nav navbar-nav">';
        $menu .= '<li><a href="'.url('mexipuntos').'" class="btn_mexipuntos">MexiPuntos</a></li>';
        $menu .= self::Department();
        $menu .= '</ul>';
        echo $menu;
    }
    
    public static function Department() {
        $depart = Department::orderBy('orderset', 'asc')->get();
        $html = '';
        foreach($depart as $key => $dep){
            $html .= '<li class="dropdown  yamm-fw"><a href="#" data-toggle="dropdown" style="background-image: url(\''.asset('public/images/department/small/'.$dep->imagesmall).'\'); " class="dropdown-toggle btn_herramientas">'.$dep->department.'</a>';
            $html .= self::Category($dep->id,$dep->department);
            $html .= '</li>';
        }
        return $html;
    }
    
    public static function Category($id,$name) {
        $cat  = Category::where('department_id',$id)->get();
        $html = '';
        if(count($cat) > 0){
            $html  = '<ul class="dropdown-menu list-unstyled  fadeInUp animated">';
            $html .= '<li><div class="yamm-content"><div class="row">';
            foreach ($cat as $key => $val) {
                $html .= '<div class="col-lg-3 col-md-4 col-xs-6">';
                $html .= '<ul class="list-unstyled">';
                $html .= '<li><a href="'.url('product/'.strtolower($name).'/'.str_slug($val->category)).'">'.$val->category.'</a></li>';
                $html .= '<li><div class="banner" align="center"><a href="'.url('product/'.strtolower($name).'/'.str_slug($val->category)).'">';
                $html .= '<img src="'.asset('public/images/category/'.$val->image).'" class="img-responsive" alt="">';
                $html .= '</a></div></li></ul></div>';
            }
            $html .= '</div></div></li>';
            $html .= '</ul>';
        }
        return $html;
    }
}
