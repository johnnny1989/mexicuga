<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;

class MexiPuntosController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    
    public function index(){
        $perData = DB::table('destinations')->whereId(1)->get();
        $percentage = $perData[0];
        $users = User::whereUsertype('user')->get();
        return view('admin.pages.mexipuntos_view', compact('users','percentage'));
    }

    public function updateMexiPuntos(Request $request){
        $date = Carbon::now()->format('d-m-Y');
        $updateArray = [
            'percentage_of_mexipuntos' => $request->percentage,
            'mexi_last_updated' => $date
        ];

        DB::table('destinations')->whereId(1)->update($updateArray);
        return back();
    }

    public function editPoint($id){
        $data = Profile::whereId($id)->get();
        $user = User::whereId($data[0]->user_id)->get();
        $name= $user[0]->name;
        return view('admin.pages.mexipuntos_edit',compact('data','name'));
    }

    public function updatePoint(Request $request,$id){
        $updateArray = [
            'mexipuntos' => $request->mexipuntos
        ];
        Profile::whereId($id)->update($updateArray);
        return redirect(route('mexipuntos'));
    }
    
}
