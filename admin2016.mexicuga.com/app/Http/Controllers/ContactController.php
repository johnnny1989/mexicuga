<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests;
use Validator;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    public function index() {
        $view = view('front.pages.contact');
        return $view;
    }
    
    protected function validator($request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255|string',
            'email' => 'required|email|max:255',
            'mobile' => 'numeric|digits:10',
            'message' => 'required|string',
            '_token' => 'required',
        ]);
    }
    
    protected function Save(Request $request) {
       $validation = $this->validator($request->all());
       if($validation->passes()){
            
            $vals = new Contact;
            $vals->name   =  strip_tags($request->name);
            $vals->email  =  strip_tags($request->email);
            $vals->mobile =  strip_tags($request->mobile);
            $vals->message = strip_tags($request->message);
            $vals->remember_token = strip_tags($request->_token);
            $vals->userip  = $_SERVER['REMOTE_ADDR'];
            $vals->created_at  = date('Y-m-d H:i:s');
            $vals->updated_at  = date('Y-m-d H:i:s');
            
            if(!$vals->save()){
                if(!$request->ajax()){
                    session(['status' => 'Saved Successfully']);
                    return redirect('contacto')->withMessage('Sorry failed to contact.');
                }else{
                    session(['status' => 'Saved Successfully']);
                    echo 0;
                }
            }else{
                Mail::send('emails.contact', ['data' => $request], function ($m){
                    $m->from('info@expertcabin.com', 'Contact Mail');
                    $m->to('alberto@factus.mx', 'Contacted')->subject('Contact Mail');
                });
                session(['status' => 'Saved Successfully']);
                return redirect('contacto')->withMessage('Thanks for contacting us.');
            }
        }else{
            if(!$request->ajax()){
                return redirect('contacto')->withInput()->withErrors($validation);
            }else{
                echo 2;
            }
        }
    }
}
