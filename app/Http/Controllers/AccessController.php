<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Access;
use App\Http\Requests\AccessRequests;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('accessor');
    }
    
    public function index() {
        $view = view('admin.pages.accesos_add');
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.accesos_view');
        $view->accessors = Access::where('usertype','!=','user')->get();
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.accesos_edit');
        $view->user = Access::find($id);
        return $view;
    }
    
    public function create(AccessRequests $request) {
        $vals = new Access;
        $vals->usertype = $request->usertype;
        $vals->email = $request->email;
        $vals->password = bcrypt($request->password);
        $vals->name = $request->name;
        $vals->contactno = $request->phoneno;
        $vals->homeaddress = $request->homeaddress;
        if($vals->save()){
            session(['status' => 'Saved Successfully']);
            return redirect('admin/accesos_view')->with('status','Saved Successfully');
        }
    }
    
    public function update(AccessRequests $request) {
        $vals = Access::find($request->userid);
        $vals->usertype = $request->usertype;
        $vals->email = $request->email;
        $vals->password = bcrypt($request->password);
        $vals->name = $request->name;
        $vals->contactno = $request->phoneno;
        $vals->homeaddress = $request->homeaddress;
        if($vals->save()){
            session(['status' => 'Saved Successfully']);
            return redirect('admin/accesos_view')->with('status','Updated Successfully');
        }
    }
    
    public function delete($id) {
        $x = Access::where('id',$id)->delete();
        if($x){ echo 1; }else{ echo 0; }
    }
}
