<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogue;
use App\Http\Requests\CatalogueRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatalogueController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.productos_catalogos_add');
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.productos_catalogos_view');
        $view->catalogues = Catalogue::all();
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.productos_catalogos_edit');
        $view->catalogue = Catalogue::find($id);
        return $view;
    }
    
    public function create(CatalogueRequest $request) {
        $vals = new Catalogue;
        $vals->name = $request->catalogue;
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function update(CatalogueRequest $request) {
        $vals = Catalogue::find($request->catalogueid);
        $vals->name = $request->catalogue;
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function delete($id) {
        $x = Catalogue::where('id',$id)->delete();
        if($x){ echo 1; }else{ echo 0; }
    }
}
