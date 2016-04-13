<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\TestRequest;
use App\Product;
use App\ProductPrice;
use App\ProductImages;
use App\Department;
use App\Category;
use App\TradeMark;
use App\Providers;
use App\Catalogue;
use App\Units;
use App\Common;
use App\Orders;
use App\User;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index() {
        $orders=DB::table("orders")->orderBy("created_at","desc")->get();
        return view("admin.pages.order_list",compact("orders"));
    }

    public function destinos_update(Request $request) {
        $arr=array("cp_origin"=>$request->cp_origin,"cost"=>$request->cost);
        DB::table("destinations")->whereId(1)->update($arr);
        return Redirect::to('/admin/destinos_view');
    }
    public function confirm_order($order_id)
    {
        DB::table("orders")->whereOrder_id($order_id)->update(array("status"=>1));
        $this->send_mail_to_customer($order_id);
        return Redirect::to('/admin/orders');
    }
    public function on_the_road($order_id)
    {
        DB::table("orders")->whereOrder_id($order_id)->update(array("status"=>2));
        $this->send_mail_to_customer($order_id);
        return Redirect::to('/admin/orders');
    }
    public function delivered_order($order_id)
    {
        DB::table("orders")->whereOrder_id($order_id)->update(array("status"=>3));
        $this->send_mail_to_customer($order_id);
        return Redirect::to('/admin/orders');
    }
    public function cancel_order($order_id)
    {
        DB::table("orders")->whereOrder_id($order_id)->update(array("status"=>4));
        return Redirect::to('/admin/orders');
    }
    public function send_mail_to_customer($order_id)
    {
        $orders = Orders::find($order_id);
        $user_email=User::find($orders->user_id);
        //return $user_email;
        $email = $user_email->email;
        if($orders->payment_type == "mexipuntos")
        {
            Mail::send('emails.points_sales', ['orders'=> $orders] , function ($m) use ($email){
                $m->from('info@expertcabin.com', 'Mexipuntos');
                $m->to($email, 'Contacted')->subject('Contact Mail');
            });
        }
        else
        {
            Mail::send('emails.orders', ['orders'=> $orders] , function ($m) use ($email){
                $m->from('info@expertcabin.com', 'Mexipuntos');
                $m->to($email, 'Customer')->subject('Order Placed');
            });
        }
    }

}
