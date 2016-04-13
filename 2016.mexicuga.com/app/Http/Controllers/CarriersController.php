<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transport;
use App\Http\Requests\TransportRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CarriersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.productos_transportistas_add');
        return $view;
    }
    
    public function view() {
        $view = view('admin.pages.productos_transportistas_view');
        $view->transporters = Transport::all();
        return $view;
    }
    
    public function edit($id) {
        $view = view('admin.pages.productos_transportistas_edit');
        $view->transporter = Transport::find($id);
        return $view;
    }
    
    public function create(TransportRequest $request) {
        $vals = new Transport;
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
    
    public function update(TransportRequest $request) {
        $vals = Transport::find($request->transporterid);
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
        $x = Transport::where('id',$id)->delete();
        if($x){ echo 1; }else{ echo 0; }
    }
}
