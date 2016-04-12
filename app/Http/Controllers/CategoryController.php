<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Common;
use App\Department;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.categorias_add');
        $view->department = Department::all(['id','department']);
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.categorias_view');
        $view->category = Category::join('department', 'category.department_id', '=', 'department.id')
                            ->select('category.*','department.department')->get();
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.categorias_edit');
        $view->category = Category::find($id);
        $view->department = Department::all(['id','department']);
        return $view;
    }
    
    public function create(CategoryRequest $request) {
        
        $vals = new Category;
        $vals->category = $request->Category;
        $vals->department_id = $request->Department;
        $vals->image = Common::ImageUpload($request->ImageNormal, 'category');
        $vals->imagesmall = Common::ImageUpload($request->ImageSmall, 'category/small');
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function update(CategoryRequest $request) {
        $vals = Category::find($request->categoryid);
        $vals->category = $request->Category;
        $vals->department_id = $request->Department;
        if($request->hasFile('ImageNormal')){  
            Common::Removefile($vals->image, 'category');
            $vals->image = Common::ImageUpload($request->ImageNormal, 'category');
        }

        if($request->hasFile('ImageSmall')){  
            Common::Removefile($vals->imagesmall, 'category/small');
            $vals->imagesmall = Common::ImageUpload($request->ImageSmall, 'category/small'); 
        }

        if($vals->save()){
            return back()->with('status','Updated Successfully');
        }
        session(['status' => 'Saved Successfully']);
    }
    
    public function delete($id) {
        $filename = Category::find($id);
        $x = Category::where('id',$id)->delete();
        if($x){
            Common::Removefile($filename->image, 'category');
            Common::Removefile($filename->imagesmall, 'category/small');
            echo 1;
        }else{ echo 0; }
    }
}
