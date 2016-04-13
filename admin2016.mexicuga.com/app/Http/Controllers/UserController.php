<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('front.user.profile');
        $view->udtl = Profile::where('user_id',Auth::id())->first();
        return $view;
    }
    
    public function order() {
        $view = view('front.user.mi-perfil-detalle-pedido');
        return $view;
    }
    
    public function shopping() {
        $view = view('front.user.mi-perfil-detalle-compras');
        return $view;
    }
    
    public function mexipuntos() {
        $view = view('front.user.mi-perfil-detalle-mexipuntos');
        return $view;
    }
    
}
