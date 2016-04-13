<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Units;
use App\Http\Requests\UnitsRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UnitsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.productos_unidades_venta_add');
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.productos_unidades_venta_view');
        $view->units = Units::all();
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.productos_unidades_venta_edit');
        $view->unit = Units::find($id);
        return $view;
    }
    
    public function create(UnitsRequest $request) {
        $vals = new Units;
        $vals->name = $request->unit;
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function update(UnitsRequest $request) {
        $vals = Units::find($request->unitid);
        $vals->name = $request->unit;
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function delete($id) {
        $x = Units::where('id',$id)->delete();
        if($x){ echo 1; }else{ echo 0; }
    }
}
