<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Common;
use Auth;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('user');
    }
    
    public function index() {
        $view = view('front.user.profile');
        $view->udtl = Profile::where('user_id',Auth::id())->first();
        return $view;
    }
    
    public function order() {
        $view = view('front.user.mi-perfil-detalle-pedido');
        $view->udtl = Profile::where('user_id',Auth::id())->first();
        return $view;
    }
    
    public function shopping() {
        $view = view('front.user.mi-perfil-detalle-compras');
        $view->udtl = Profile::where('user_id',Auth::id())->first();
        return $view;
    }
    
    public function mexipuntos() {
        $view = view('front.user.mi-perfil-detalle-mexipuntos');
        $view->udtl = Profile::where('user_id',Auth::id())->first();
        return $view;
    }
    
    public function termandconditions() {
        $view = view('front.pages.terminos-condiciones-uso');
        return $view;
    }
    
    protected function SaveProfile(Request $request) {
        
       $validation = Validator::make($request->all(), [
            'fname'  => 'required|max:255|string',
            'lname'  => 'max:255|string',
            'maternalname'  =>  'string',
            'phone'     => 'numeric',
            'mobile'    => 'numeric',
            'company'   => 'string|max:255',
            'webpage'   => 'string',
        ]);
       
       if($validation->passes()){
            
            
            $vals = Profile::firstOrCreate(['user_id' => Auth::id()]);
            
            $vals->lastname =  strip_tags($request->lname);
            $vals->maternalname = strip_tags($request->maternalname);
            $vals->phone    =  strip_tags($request->phone);
            $vals->mobile   =  strip_tags($request->mobile);
            $vals->company  = strip_tags($request->company);
            $vals->webpage  = strip_tags($request->webpage);

            if(!$vals->save()){
               /* if(!$request->ajax()){
                    return redirect('mi-perfil')->withMessage('Sorry failed to Update.');
                }else{*/
                    echo 0;
              /*  } */
            }else{
                $pro = User::find(Auth::id());
                $pro->name = strip_tags($request->fname);
                $pro->save();
                session(['status' => 'Saved Successfully']);
                return redirect('mi-perfil')->withMessage('Profile Updated.');
            }
        }else{
            if(!$request->ajax()){
                return redirect('mi-perfil')->withErrors($validation);
            }else{
                echo 2;
            }
        }
    }
    
    
    protected function SavePassword(Request $request) {
        
       $validation = Validator::make($request->all(), [
            'oldpassword'           => 'required|max:255',
            'password'              => 'required|max:255|confirmed',
            '_token'                => 'required',
        ]);
       
       if($validation->passes()){
            
            if (Auth::attempt(['id' => Auth::id(), 'password' => $request->oldpassword])) {
                $vals = User::find(Auth::id());
                $vals->password =  bcrypt($request->password);
                if(!$vals->save()){
                        echo 0;
                }else{
                    return redirect('mi-perfil')->withMessage('Profile Updated.');
                }
            }else{  echo 3; }
        }else{
            if(!$request->ajax()){
                return redirect('mi-perfil')->withErrors($validation);
            }else{
                echo 2;
            }
        }
    }
    
    protected function SaveBillinfo(Request $request) {
        
       $validation = Validator::make($request->all(), [
            'bill_name'         => 'required',
            'bill_rfc'          => 'required',//'required|digits:13',
            'bill_cp'           => 'required|max:255',
            'bill_street'       => 'required|max:255',
            'bill_noext'        => 'required|numeric|max:255',
            'bill_noint'        => 'required|numeric|max:255',
            'bill_colony'       => 'required|max:255',
            'bill_muncipility'  => 'required|max:255',
            'bill_state'        => 'required|max:255',
            'bill_country'      => 'required|max:255',
            '_token'            => 'required',
        ]);
       
       if($validation->passes()){
           
                $vals = Profile::firstOrCreate(['user_id' => Auth::id()]);
                $vals->bill_name        =  $request->bill_name;
                $vals->bill_rfc         =  $request->bill_rfc;
                $vals->bill_cp          =  $request->bill_cp;
                $vals->bill_street      =  $request->bill_street;
                $vals->bill_noext       =  $request->bill_noext;
                $vals->bill_noint       =  $request->bill_noint;
                $vals->bill_colony      =  $request->bill_colony;
                $vals->bill_muncipility =  $request->bill_muncipility;
                $vals->bill_state       =  $request->bill_state;
                $vals->bill_country     =  $request->bill_country;
                
                if(!$vals->save()){
                        echo 0;
                }else{
                    return redirect('mi-perfil')->withMessage('Profile Updated.');
                }
        }else{
//           return $validation->errors();
            if(!$request->ajax()){
                return redirect('mi-perfil')->withErrors($validation);
            }else{
                echo 2;
            }
        }
    }
    
    protected function SaveShipinfo(Request $request) {
        
       $validation = Validator::make($request->all(), [
            'ship_cp'           => 'required|max:255',
            'ship_street'       => 'required|max:255',
            'ship_noext'        => 'required|numeric|max:255',
            'ship_noint'        => 'required|numeric|max:255',
            'ship_colony'       => 'required|max:255',
            'ship_muncipility'  => 'required|max:255',
            'ship_state'        => 'required|max:255',
            'ship_country'      => 'required|max:255',
            '_token'            => 'required',
        ]);
       
       if($validation->passes()){
           
                $vals = Profile::firstOrCreate(['user_id' => Auth::id()]);

                $vals->ship_cp          =  $request->ship_cp;
                $vals->ship_street      =  $request->ship_street;
                $vals->ship_noext       =  $request->ship_noext;
                $vals->ship_noint       =  $request->ship_noint;
                $vals->ship_colony      =  $request->ship_colony;
                $vals->ship_muncipility =  $request->ship_muncipility;
                $vals->ship_state       =  $request->ship_state;
                $vals->ship_country     =  $request->ship_country;
                
                if(!$vals->save()){
                        echo 0;
                }else{
                    return redirect('mi-perfil')->withMessage('Profile Updated.');
                }
        }else{
            if(!$request->ajax()){
                return redirect('mi-perfil')->withErrors($validation);
            }else{
                echo 2;
            }
        }
    }

    public function view_order($invoice_number){
        $orders = Orders::whereInvoiceNumber($invoice_number)->get()->first();
        if(empty($orders)){
            return back();
        }else{
            $view = view('front.pages.view_order',compact('orders'));
            $view->udtl = Profile::where('user_id',Auth::id())->first();
            return $view;
        }

    }
    
}
