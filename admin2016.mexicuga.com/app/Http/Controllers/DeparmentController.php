<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Common;
use App\Http\Requests;
use App\Http\Requests\DepartmentRequest;
use App\Http\Controllers\Controller;

class DeparmentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.departamentos_add');
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.departamentos_view');
        $view->departments = Department::orderBy('orderset', 'asc')->get();
        $view->nosdep = count($view->departments);
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.departamentos_edit');
        $view->department = Department::find($id);
        return $view;
    }
    
    public function create(DepartmentRequest $request) {
        
        $vals = new Department;
        $vals->department = $request->Department;
        $vals->image = Common::ImageUpload($request->ImageNormal, 'department');
        $vals->imagesmall = Common::ImageUpload($request->ImageSmall, 'department/small');
        $vals->save();
        $depart = Department::find($vals->id);
        $depart->orderset = $vals->id;
        $depart->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function update(DepartmentRequest $request) {
        $vals = Department::find($request->departmentid);
        $vals->department = $request->Department;
        if($request->hasFile('ImageNormal')){  
            Common::Removefile($vals->image, 'department');
            $vals->image = Common::ImageUpload($request->ImageNormal, 'department');
        }

        if($request->hasFile('ImageSmall')){  
            Common::Removefile($vals->imagesmall, 'department/small');
            $vals->imagesmall = Common::ImageUpload($request->ImageSmall, 'department/small'); 
        }

        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function delete($id) {
        $filename = Department::find($id);
        $x = Department::where('id',$id)->delete();
        if($x){
            Common::Removefile($filename->image, 'department');
            Common::Removefile($filename->imagesmall, 'department/small');
            echo 1;
        }else{ echo 0; }
    }
    
    public function SetOrder($id,$direction) {
        $department = Department::where(['id' => $id])->first();

        //return $department;
        if($direction === 'up'){
            // get previous id
            $department_orderset=$department->orderset;
            if($department_orderset >=1)
            {
                $new_department_orderset=$department->orderset-1;
                Department::where("orderset",$new_department_orderset)->update(array("orderset" => $department_orderset));
                Department::where("id",$id)->update(array("orderset" => $new_department_orderset));
            }

            //$getid = Department::where('orderset', '<', $department->orderset)->orderBy('orderset', 'desc')->take(1)->first();
            //return $getid;
           /* $getid = Department::whereId($id)->first();
            if($getid['orderset'] >1) {
                $previous_order = $getid['orderset'] - 1;
                Department::whereId($id)->update(array("orderset" => $previous_order));
            }*/
            //update pevious id
            //$this->updateorder($getid->id,$department->orderset);
            // update current id
            //$this->updateorder($department->id,$getid->orderset);
            
        }elseif($direction === 'down'){
            $department_orderset=$department->orderset;
            if($department_orderset >=1)
            {
                $new_department_orderset=$department->orderset+1;
                Department::where("orderset",$new_department_orderset)->update(array("orderset" => $department_orderset));
                Department::where("id",$id)->update(array("orderset" => $new_department_orderset));
            }
            // get next id
//            $getid = Department::where('orderset', '>', $department->orderset)->orderBy('orderset', 'asc')->take(1)->first();
//            // update pevious id
//            $this->updateorder($getid->id,$department->orderset);
//            // update current id
//            $this->updateorder($department->id,$getid->orderset);
        }
        //print_r($getid->orderset);
    }
    
    public function updateorder($id,$getid) {
            $x  = Department::find($id);
            $x->orderset  = $getid;
            $x->save();
    }
}
