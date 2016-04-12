<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use App\Cart;
use App\Orders;
use Illuminate\Http\Request;
use App\Shop;
use LaraCart;
use Auth;
use Mail;
use App\Profile;
use Srmklive\PayPal\Facades\PayPal;
use App\Http\Requests;

class ShopController extends Controller
{

    public function addproduct($productid, $priceid, $qty)
    {
        Shop::AddProduct($productid, $priceid, $qty);
    }
    
    public function UpdateCart($hash, $qty)
    {
        LaraCart::updateItem($hash, 'qty', $qty);
    }
    
    public function minicart()
    {
        Shop::MiniCart();
    }
    
    public function RemoveProduct($itemhash)
    {
        LaraCart::removeItem($itemhash);
    }
    
    public function SortIt($sortby)
    {
        if ($sortby === 'a-z') {
            session(['name' => 'userName']);
            session(['sortby' => 'asc']);
        } elseif ($sortby === 'z-a') {
            session(['name' => 'userName']);
            session(['sortby' => 'desc']);
        } elseif ($sortby === 'l2h') {
            session(['name' => 'public_price']);
            session(['sortby' => 'asc']);
        } elseif ($sortby === 'h2l') {
            session(['name' => 'public_price']);
            session(['sortby' => 'desc']);
        }
    }
    
    public function SortBrand($sortby)
    {
        return session(['brand' => $sortby]);
    }
    
    public function checkout()
    {
        $view = view('front.pages.compair');
        if (Auth::check()) {
            $view->udtl = Profile::where('user_id', Auth::id())->first();
        }
        return $view;
    }
    
    public function PageScroll()
    {
        if (session('rowsavailable') > session('takeit')) {
            session(['takeit' => intval(session('takeit')) + 16]);
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function PayNow(Request $request)
    {
//         return $request->all();
        $cart = LaraCart::getItems();
        if (empty($cart)) {
//            return "empty cart";
            return back();
        }
        if (Auth::check()) {

            $shipping_data = DB::table('destinations')->first();

            $distance = 0;
            if ($request->ship_cp != $shipping_data->cp_origin) {
                $map_api = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=Mexico-$shipping_data->cp_origin&destinations=Mexico-$request->ship_cp&mode=car&language=en&sensor=false";
                $distance = file_get_contents($map_api);
            }

            $data_distance = json_decode($distance);
            $km = explode(" ",$data_distance->rows[0]->elements[0]->distance->text);
            $total_distance = $km[0];

            $shipping_cost = number_format($total_distance * $shipping_data->cost,2);

            $m = [];
            $normal_price = 0;
            $mp_price = 0;
            foreach (LaraCart::getItems() as $key => $item) {

                $product_id = $item->id;
                $product = Product::whereId($product_id)->get();
                if ($product[0]->producttype == "MexiPuntos") {
                    $mp_price = $mp_price + number_format(($item->price * $item->qty), 2);
                } else {
                    $price = number_format(($item->price * $item->qty), 2);
                    $m[] = [
                        'name' => $item->name,
                        'price' => $price
                    ];
                    $normal_price = $price;
                }
            }

            $update_array = [
//                'latitude' => $request->latitude,
//                'longitude' => $request->longitude,
                'ship_cp' => $request->ship_cp,
                'ship_street' => $request->ship_street,
                'ship_noext' => $request->ship_noext,
                'ship_noint' => $request->ship_noint,
                'ship_colony' => $request->ship_colony,
                'ship_muncipility' => $request->ship_muncipility,
                'ship_state' => $request->ship_state,
                'bill_name' => $request->bill_name,
                'bill_rfc' => $request->bill_rfc,
                'bill_cp' => $request->bill_cp,
                'bill_street' => $request->bill_street,
                'bill_noext' => $request->bill_noext,
                'bill_noint' => $request->bill_noint,
                'bill_colony' => $request->bill_colony,
                'bill_muncipility' => $request->bill_muncipility,
                'bill_state' => $request->bill_state,
            ];

            $user_id = Auth::user()->id;
            $email = Auth::user()->email;
            $update_profile = Profile::whereUserId($user_id)->update($update_array);

            $user_profile = Profile::where('user_id', Auth::id())->first();
            $myMexipuntos = $user_profile->mexipuntos;
            $mp_total_price = number_format($mp_price + $shipping_cost,2);


            // Code for mexipuntos Items
            if($mp_price > 0 && $mp_total_price <= $myMexipuntos) {

                $mexipuntos_order = Orders::create($request->all());
                $mexipuntos_invoice = "mexi-".time() . rand(0000, 9999);
                $mexipuntos_update = [
                    'user_id' => Auth::user()->id,
                    'invoice_number' => $mexipuntos_invoice
                ];

                $update = Orders::whereOrderId($mexipuntos_order->order_id)->update($mexipuntos_update);

                $mexipuntos_order = Orders::whereOrderId($mexipuntos_order->order_id)->get();
//                return $order;
                if (count($mexipuntos_order) == 1) {
                    $mexiupdateArray = array(
                        'user_id' => Auth::user()->id,
                        'order_description' => "Order #$mexipuntos_invoice Invoice",
                        'payment_type' => "mexipuntos",
                        'amount' => $mp_total_price,
                        'total_distance' => $total_distance,
                        'shipping_charge' => $shipping_cost,
                        'currency' => "USD",
                        'order_confirm' => 1
                    );

                    $mexiOrderUpdate = Orders::whereOrder_id($mexipuntos_order[0]->order_id)->update($mexiupdateArray);
                    if ($mexipuntos_order[0]->token == "") {
                        foreach (LaraCart::getItems() as $key => $item) {
                            $product_id = $item->id;
                            $product = Product::whereId($product_id)->get();
                            if ($product[0]->producttype == "MexiPuntos") {
                                $mexi_cart = new Cart();
                                $mexi_cart->product_id = $item->id;
                                $mexi_cart->qty = $item->qty;
                                $mexi_cart->name = $item->name;
                                $mexi_cart->price = $item->price;
                                $mexi_cart->priceid = $item->priceid;
                                $mexi_cart->image = $item->image;
                                $mexi_cart->code = $item->code;
                                $mexi_cart->user_id = Auth::user()->id;
                                $mexi_cart->order_id = $mexipuntos_order[0]->order_id;
                                $mexi_cart->save();
                            }
                        }
                    }
                }

                $update_mexipuntos = array (
                    'mexipuntos' => ($myMexipuntos - $mp_total_price)
                );
                $update_profile = Profile::whereUserId($user_id)->update($update_mexipuntos);

                $orders = Orders::find($mexipuntos_order[0]->order_id);
                $email = Auth::user()->email;

                Mail::send('emails.points_sales', ['orders'=> $orders] , function ($m) use ($email){
                    $m->from('info@expertcabin.com', 'Mexipuntos');
                    $m->to($email, 'Contacted')->subject('Contact Mail');
                });

//                return $mp_total_price."success";

                if(!isset($m[0])){
                    LaraCart::destroyCart();
                    $orders = Orders::find($mexipuntos_order[0]->order_id);
                    $view = view('front.pages.successpayment', compact('orders'));
                    $view->payment_type = 2;// This is confirm on mexipuntos order.
                    $view->udtl = Profile::where('user_id', Auth::id())->first();
                    return $view;
                }
            }elseif($mp_total_price > $myMexipuntos) {
                if(!isset($m[0])){

                    return $mp_total_price;
                    return "mexipuntos error";
                    return back()->withErrors('Mexipuntos','You don\'t have enough mexipuntos to make purchase');
                }
            }
            // Code ends for mexipuntos

            $total_price = ($normal_price + $shipping_cost);
            $m[] = [
                'name' => "Shipping Charge",
                'price' => (float)($shipping_cost)
            ];
            $data['items'] = $m;

            $order = Orders::create($request->all());
            $data['invoice_id'] = time() . rand(0000, 9999);
            $order_update = [
                'user_id' => Auth::user()->id,
                'invoice_number' => $data['invoice_id']
            ];
            $update = Orders::whereOrderId($order->order_id)->update($order_update);


            if ($request->payment_type == 'paypal') {
                $data['invoice_description'] = "Order #$data[invoice_id] Invoice";
                $data['return_url'] = url('/payment/success');
                $data['cancel_url'] = url('/cart');

                $updateArray = array(
                    'user_id' => Auth::user()->id,
                    'order_description' => "Order #$data[invoice_id] Invoice",
                    'payment_type' => 'paypal',
                    'amount' => $total_price,
                    'total_distance' => $total_distance,
                    'shipping_charge' => $shipping_cost,
                    'currency' => "USD",
                    'order_confirm' => 0
                );

                $orderUpdate = Orders::whereOrder_id($order->order_id)->update($updateArray);

                $data['total'] = (float)$total_price;

                $response = PayPal::getProvider()->setExpressCheckout($data);
//                return $data;
//                return $response;
                return redirect($response['paypal_link']);
            } else {
                $order = Orders::whereOrderId($order->order_id)->get();
//                return $order;
                if (count($order) == 1) {
                   $updateArray = array(
                        'user_id' => Auth::user()->id,
                        'order_description' => "Order #$data[invoice_id] Invoice",
                        'payment_type' => 'cash_on_delivery',
                        'amount' => $total_price,
                        'total_distance' => $total_distance,
                        'shipping_charge' => $shipping_cost,
                        'currency' => "USD",
                        'order_confirm' => 1
                    );

                    $orderUpdate = Orders::whereOrder_id($order->order_id)->update($updateArray);
                    if ($order[0]->token == "") {
                        foreach (LaraCart::getItems() as $key => $item) {
                            $product_id = $item->id;
                            $product = Product::whereId($product_id)->get();
                            if ($product[0]->producttype != "MexiPuntos") {
                                $cart = new Cart();
                                $cart->product_id = $item->id;
                                $cart->qty = $item->qty;
                                $cart->name = $item->name;
                                $cart->price = $item->price;
                                $cart->priceid = $item->priceid;
                                $cart->image = $item->image;
                                $cart->code = $item->code;
                                $cart->user_id = Auth::user()->id;
                                $cart->order_id = $order[0]->order_id;
                                $cart->save();
                            }
                        }
                        LaraCart::destroyCart();
                    }

//                    $update_mexipuntos = array (
//                        'mexipuntos' => number_format($myMexipuntos - $total_price,2)
//                    );
//                    $update_profile = Profile::whereUserId($user_id)->update($update_mexipuntos);

                    $orders = Orders::find($order[0]->order_id);
                    $email = Auth::user()->email;

                    Mail::send('emails.orders', ['orders'=> $orders] , function ($m) use ($email){
                        $m->from('info@expertcabin.com', 'Mexipuntos');
                        $m->to($email, 'Customer')->subject('Order Placed');
                    });
//                    $orders->getCart;
                    $view = view('front.pages.successpayment', compact('orders'));
                    $view->payment_type = 1;// This is confirm on cash on deliver.
                    $view->udtl = Profile::where('user_id', Auth::id())->first();
                    return $view;
                }
            }

        } else {
            return back()->withErrors('login', 'You have to login first');
        }
    }

    public function PayNow1(Request $request)
        {
//         return $request->all();
            $cart = LaraCart::getItems();
            if (empty($cart)) {
                return back();
            }
            if (Auth::check()) {
                $m = [];
                $mp_price = 0;
                foreach (LaraCart::getItems() as $key => $item) {
                        $price = number_format(($item->price * $item->qty), 2);
                        $m[] = [
                            'name' => $item->name,
                            'price' => $price
                        ];

                }
                $user_profile = Profile::whereUserId(Auth::user()->id)->get()->first();
                if ($user_profile->mexipuntos < $mp_price) {
                    return back()->withErrors("Mexipuntos", "You have not enough mexipuntos to make this purchase.");
                }

//                if ($mp_price > 0) {
//                    foreach (LaraCart::getItems() as $key => $item) {
//                        $product_id = $item->id;
//                        $product = Product::whereId($product_id)->get();
//                        if ($product[0]->producttype == "MexiPuntos") {
//                            $mp_price = $mp_price + number_format(($item->price * $item->qty), 2);
//                        } else {
//                            $price = number_format(($item->price * $item->qty), 2);
//                            $m[] = [
//                                'name' => $item->name,
//                                'price' => $price
//                            ];
//                        }
//                    }
//                }
                $data['items'] = $m;

                $update_array = [
//                    'latitude' => $request->latitude,
//                    'longitude' => $request->longitude,
                    'ship_cp' => $request->ship_cp,
                    'ship_street' => $request->ship_street,
                    'ship_noext' => $request->ship_noext,
                    'ship_noint' => $request->ship_noint,
                    'ship_colony' => $request->ship_colony,
                    'ship_muncipility' => $request->ship_muncipility,
                    'ship_state' => $request->ship_state,
                    'bill_name' => $request->bill_name,
                    'bill_rfc' => $request->bill_rfc,
                    'bill_cp' => $request->bill_cp,
                    'bill_street' => $request->bill_street,
                    'bill_noext' => $request->bill_noext,
                    'bill_noint' => $request->bill_noint,
                    'bill_colony' => $request->bill_colony,
                    'bill_muncipility' => $request->bill_muncipility,
                    'bill_state' => $request->bill_state,
                ];

                $shipping_data = DB::table('destinations')->first();

                $distance = 0;
                if ($request->ship_cp != $shipping_data->cp_origin) {
                    $map_api = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=Mexico-$shipping_data->cp_origin&destinations=Mexico-$request->ship_cp&mode=car&language=en&sensor=false";
                    $distance = file_get_contents($map_api);
                }


                $user_id = Auth::user()->id;
//            return $user_id;
                $update_profile = Profile::whereUserId($user_id)->update($update_array);

//            return $update_profile;
                $order = Orders::create($request->all());
                $data['invoice_id'] = time() . rand(0000, 9999);
                $order_update = [
                    'user_id' => Auth::user()->id,
                    'invoice_number' => $data['invoice_id']
                ];

                $update = Orders::whereOrderId($order->order_id)->update($order_update);

//            $data['invoice_id'] = time();
//            $order = new Orders();
//            $order->user_id = Auth::user()->id;
//            $order->invoice_number = $data['invoice_id'];
//            $order->save();
                if ($request->payment_type == 'paypal') {
                    $data['invoice_description'] = "Order #$data[invoice_id] Invoice";
                    $data['return_url'] = url('/payment/success');
                    $data['cancel_url'] = url('/cart');

                    $total = 0;
                    foreach ($data['items'] as $item) {
                        $total += $item['price'];
                    }

                    $data['total'] = $total;

                    $response = PayPal::getProvider()->setExpressCheckout($data);
                    return $data;
                    return redirect($response['paypal_link']);
                } else {
                    $order = Orders::whereOrderId($order->order_id)->get();
//                return $order;
                    if (count($order) == 1) {
                        $updateArray = array(
                            'user_id' => Auth::user()->id,
                            'order_description' => "Order #$data[invoice_id] Invoice",
//                        'payer_id' => $response['PAYERID'],
//                        'token' => $response['TOKEN'],
                            'amount' => $request->amount,
                            'order_confirm' => 1,
                            'currency' => "USD"
                        );

                        $orderUpdate = Orders::whereOrder_id($order[0]->order_id)->update($updateArray);
                        if ($order[0]->token == "") {
                            foreach (LaraCart::getItems() as $key => $item) {
                                $cart = new Cart();
                                $cart->product_id = $item->id;
                                $cart->qty = $item->qty;
                                $cart->name = $item->name;
                                $cart->price = $item->price;
                                $cart->priceid = $item->priceid;
                                $cart->image = $item->image;
                                $cart->code = $item->code;
                                $cart->user_id = Auth::user()->id;
                                $cart->order_id = $order[0]->order_id;
                                $cart->save();
                            }
                            LaraCart::destroyCart();
                        }
                        $orders = Orders::find($order[0]->order_id);
//                    $orders->getCart;
                        $view = view('front.pages.successpayment', compact('orders'));
                        $view->payment_type = 1;// This is confirm on cash on deliver.
                        $view->udtl = Profile::where('user_id', Auth::id())->first();
                        return $view;
                    }
                }

            } else {
                return back()->withErrors('login', 'You have to login first');
            }
        }


//    $data['items'] = [
//    [
//        'name' => 'Product 1',
//        'price' => 9.99
//    ],
//    [
//        'name' => 'Product 2',
//        'price' => 4.99
//    ]
//];

//        $data['invoice_id'] = time();
//        $order = new Orders();
//        $order->user_id = Auth::user()->id;
//        $order->invoice_number = $data['invoice_id'];
//        $order->save();
//        $data['invoice_description'] = "Order #$data[invoice_id] Invoice";
//        $data['return_url'] = url('/payment/success');
//        $data['cancel_url'] = url('/cart');
//
//        $total = 0;
//        foreach($data['items'] as $item) {
//            $total += $item['price'];
//        }
//
//        $data['total'] = $total;

//        $response = PayPal::getProvider()->setExpressCheckout($data);
//echo '<pre>';
//print_r($response);
//return redirect($response['paypal_link']);
    //$response = PayPal::getProvider()->getExpressCheckoutDetails($token);


    public function PaySuccess()
    {
        if (Auth::check()) {
            $token = $_GET['token'];
            $PayerID = $_GET['PayerID'];

            $response = PayPal::getProvider()->getExpressCheckoutDetails($token);
//            $response = PayPal::getProvider()->refundTransaction($token);
//            return $response;
            if ($response['ACK'] == "Success") {
                $order = Orders::whereUser_id(Auth::user()->id)->whereInvoiceNumber($response['INVNUM'])->get();
//                return $order;
                if (count($order) == 1) {
                    $updateArray = array(
                        'user_id' => Auth::user()->id,
                        'order_description' => $response['DESC'],
                        'payer_id' => $response['PAYERID'],
                        'token' => $response['TOKEN'],
                        'currency' => $response['CURRENCYCODE'],
                        'order_confirm' => 1
                    );

                    $orderUpdate = Orders::whereOrder_id($order[0]->order_id)->update($updateArray);
                    if ($order[0]->token == "") {
                        foreach (LaraCart::getItems() as $key => $item) {
                            $product_id = $item->id;
                            $product = Product::whereId($product_id)->get();
                            if ($product[0]->producttype != "MexiPuntos") {
                                $cart = new Cart();
                                $cart->product_id = $item->id;
                                $cart->qty = $item->qty;
                                $cart->name = $item->name;
                                $cart->price = $item->price;
                                $cart->priceid = $item->priceid;
                                $cart->image = $item->image;
                                $cart->code = $item->code;
                                $cart->user_id = Auth::user()->id;
                                $cart->order_id = $order[0]->order_id;
                                $cart->save();
                            }
                        }
                        LaraCart::destroyCart();
                    }
                    $profile = Profile::whereUserId(Auth::user()->id)->get()->first();
                    $total_amount = 0;
                    $mp_percent = 10;
                    $update_mexipuntos = array (
                        'mexipuntos' => $profile->mexipuntos + ($total_amount * $mp_percent/100)
                    );
                    $update_profile = Profile::whereUserId(Auth::user()->id)->update($update_mexipuntos);

                    $orders = Orders::find($order[0]->order_id);
                    $email = Auth::user()->email;

                    Mail::send('emails.orders', ['orders'=> $orders] , function ($m) use ($email){
                        $m->from('info@expertcabin.com', 'Mexipuntos');
                        $m->to($email, 'Customer')->subject('Order Placed');
                    });

//                    $orders->getCart;
                    $view = view('front.pages.successpayment', compact('orders'));
                    $view->udtl = Profile::where('user_id', Auth::id())->first();
                    return $view;
                } else {
                    return back();
                }
            }elseif($response['ACK'] != "Success"){
                return "Paypal response error.";
            }

            $view = view('front.pages.compair');
            if (Auth::check()) {
                $view->udtl = Profile::where('user_id', Auth::id())->first();
            }
            return $view;
        } else {
            return back()->withErrors('login', "You have to login first");
        }
    }

}