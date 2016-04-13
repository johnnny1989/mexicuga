<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use LaraCart;
use Auth;
use App\Profile;
use Srmklive\PayPal\Facades\PayPal;
use App\Http\Requests;

class ShopController extends Controller
{
   
    public function addproduct($productid,$priceid,$qty) {
        Shop::AddProduct($productid, $priceid,$qty);
    }
    
    public function UpdateCart($hash,$qty) {
        LaraCart::updateItem($hash, 'qty', $qty);
    }
    
    public function minicart() {
        Shop::MiniCart();
    }
    
    public function RemoveProduct($itemhash) {
        LaraCart::removeItem($itemhash);
    }
    
    public function SortIt($sortby) {
        if($sortby === 'a-z'){
            session(['name'     => 'userName']);
            session(['sortby'   => 'asc']);
        }elseif($sortby === 'z-a'){
            session(['name'     => 'userName']);
            session(['sortby'   => 'desc']);
        }elseif($sortby === 'l2h'){
            session(['name'     => 'public_price']);
            session(['sortby'   => 'asc']);
        }elseif($sortby === 'h2l'){
            session(['name'     => 'public_price']);
            session(['sortby'   => 'desc']);
        }
    }
    
    public function SortBrand($sortby) {
        return session(['brand' => $sortby]);
    }
    
    public function checkout() {
        $view = view('front.pages.compair');
        if(Auth::check()){
            $view->udtl = Profile::where('user_id',Auth::id())->first();
        }
        return $view;
    }
    
    public function PageScroll() {
        if(session('rowsavailable') > session('takeit')){
            session(['takeit' => intval(session('takeit')) + 16]);
            echo 1;
        }else{
            echo 0;
        }
    }
    
    public function PayNow() {
        $m = [];
        foreach(LaraCart::getItems() as $key => $item){
            $price = number_format(($item->price*$item->qty),2);
            $m[] = [
                                'name' => $item->name,
                                'price' => $price
                              ];
        }
        $data['items'] = $m;

    

        $data['invoice_id'] = rand(10,100);
        $data['invoice_description'] = "Order #$data[invoice_id] Invoice";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/cart');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price'];
        }

        $data['total'] = $total;
        
        $response = PayPal::getProvider()->setExpressCheckout($data);
        return redirect($response['paypal_link']);
    }
}
