<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TradeMark;
use App\Http\Requests\TrademarkRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.productos_marcas_add');
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.productos_marcas_view');
        $view->trademarks = TradeMark::all();
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.productos_marcas_edit');
        $view->trademark = TradeMark::find($id);
        return $view;
    }
    
    public function create(TrademarkRequest $request) {
        $vals = new TradeMark;
        $vals->name = $request->trademark;
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function update(TrademarkRequest $request) {
        $vals = TradeMark::find($request->trademarkid);
        $vals->name = $request->trademark;
        $vals->save();
        session(['status' => 'Saved Successfully']);
    }
    
    public function delete($id) {
        $x = TradeMark::where('id',$id)->delete();
        if($x){ echo 1; }else{ echo 0; }
    }
}
