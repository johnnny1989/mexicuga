<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers;
use App\Http\Requests\ProvidersRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProvidersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.productos_proveedores_add');
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.productos_proveedores_view');
        $view->providers = Providers::all();
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.productos_proveedores_edit');
        $view->provider = Providers::find($id);
        return $view;
    }
    
    public function create(ProvidersRequest $request) {
        $vals = new Providers;
        $vals->company      = $request->company;
        $vals->personname   = $request->personname;
        $vals->phonetype    = $request->phonetype;
        $vals->phoneno      = $request->phoneno;
        $vals->email        = $request->email;
        $vals->website      = $request->website;
        $vals->comments     = $request->comments;
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function update(ProvidersRequest $request) {
        $vals = Providers::find($request->providerid);
        $vals->company      = $request->company;
        $vals->personname   = $request->personname;
        $vals->phonetype    = $request->phonetype;
        $vals->phoneno      = $request->phoneno;
        $vals->email        = $request->email;
        $vals->website      = $request->website;
        $vals->comments     = $request->comments;
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function delete($id) {
        $x = Providers::where('id',$id)->delete();
        if($x){ echo 1; }else{ echo 0; }
    }
}
