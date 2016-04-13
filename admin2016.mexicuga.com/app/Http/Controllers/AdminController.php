<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $view = view('admin.pages.dashboard');
        return $view;
    }
    
    public function profile() {
        $view = view('admin.pages.mi_perfil');
        return $view;
    }
    
    public function users() {
        $view = view('admin.pages.users_view');
        $view->user = User::join('profile', 'users.id', '=', 'profile.user_id')
                      ->where('users.usertype','!=','admin')
                      ->select('users.name','users.email','users.created_at','profile.lastname','profile.bill_name', 'profile.phone','profile.mobile')
                      ->paginate(15);
        return $view;
    }
    
}
