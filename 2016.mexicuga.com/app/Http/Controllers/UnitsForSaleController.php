<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UnitsForSaleController extends Controller
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
        return $view;
    }
    
    public function edit() {
        $view = view('admin.pages.productos_unidades_venta_edit');
        return $view;
    }
}
