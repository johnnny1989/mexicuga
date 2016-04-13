<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\ProductPrice;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use LaraCart;
class Shop extends Model
{
    public static function AddProduct($productid,$priceid,$qty) {
        $product = Product::find($productid);
        $price   = ProductPrice::where(['product_id' => $productid,'id'=>$priceid])->first();
        if($price->discount > 0){
            $pp = round($price->public_price - (($price->public_price * $price->discount)/100),2);
        }else{
            $pp = $price->public_price;
        }
        LaraCart::add($productid, $product->userName, $qty, $pp, [
            'priceid' => $price->id,
            'image'   => $product->imagename,
            'code'   => $product->code
        ]);
    }
    
    public static function MiniCart() {
        $html  = '<a href="#"  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">Mi Carrito';
        $html .= '<span>'.LaraCart::count($withItemQty = true).' artículo(s)-'.LaraCart::total($formatted = false, $withDiscount = true).'</span>';
        $html .= '</a><div class="dropdown-menu shopping-cart-content pull-right" >';
        $html .= '<div class="shopping-cart-items">';
        foreach(LaraCart::getItems() as $key => $item){
        $html .= '<div class="item pull-left">';
        $html .= '<img src="'.asset('public/images/product/'.$item->image).'" alt="'.$item->name.'" class="pull-left">';
        $html .= '<div class="pull-left">';
        $html .= '<p class="ancho_max" title="'.$item->name.'"><input type="number" min="1" id="CartItem_'.$item->id.'" style="width:50px;" onchange="UpdateMinicart(\''.$item->itemHash.'\','.$item->id.')" value="'.$item->qty.'" size="3">'.str_limit($item->name,50).'</p>';
        $html .= '<p><strong>'.$item->code.'</strong> | <strong><span class="color-active">$ '.number_format(($item->price*$item->qty),2).'</span></strong></p>';
        $html .= '<p><span style="cursor:pointer;" onclick="RemoveProduct(\''.$item->itemHash.'\')" class="trash_btn"><i class="fa fa-trash-o pull-left"></i></span></p>';
        $html .= '</div></div>';
        }
        
        $html .= '<div class="total pull-left">';
        $html .= '<table><tbody class="pull-right"><tr class="color-active">';
        $html .= '<td><b>Total:</b></td><td><b>$ '.LaraCart::total($formatted = false, $withDiscount = true).'</b></td>';
        $html .= '</tr></tbody></table>';
        $html .= '<a href="'.url('comprar').'" class="btn-read pull-right"><i class="fa fa-check-square-o"></i> Comprar</a>';
        $html .= '</div></div>';
        echo $html;
    }

    public static function MisPedidos(){
        $html = '<table><table class="table table-hover"><thead><tr><th>Pedido No.</th><th>Fecha</th><th>Total</th><th>Status</th><th>&nbsp;</th></tr></thead><tbody>';
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $orders = Orders::whereUserId($user_id)->whereOrderConfirm(1)->where('payment_type','!=','mexipuntos')->where('status','!=',3)->get();
            foreach ($orders as $order) {
                $html .= '<tr><td>#'.$order->invoice_number.'</td><td>'.$order->created_at.'</td><td>$ '.$order->amount.'</td><td>';
                if($order->status == 0){
                    $html .= '<span class="label status_nuevo"><i class="fa fa-plus"></i> Nuevo</span>';
                }elseif($order->status == 1){
                    $html .= '<span class="label status_en_ruta"><i class="fa fa-truck"></i> En Ruta</span>';
                }elseif($order->status == 2){
                    $html .= '<span class="label status_cancella"><i class="fa fa-ban"></i> Calcella</span>';
                }
                $url = url('/mi-perfil-detalle-pedido/')."/".$order->invoice_number;
                $html .= '</td><td class="text-right"><a class="btn btn-mini" href="'.$url.'"><i class="fa fa-search"></i> Ver Detalle</a></td></tr>';
            }
        }else{

        }
        $html .= '</tbody></table>';
        echo $html;
    }

    public static function MisCompras(){
        $html = '<table><table class="table table-hover"><thead><tr><th>Pedido No.</th><th>Fecha</th><th>Total</th><th>Status</th><th>&nbsp;</th></tr></thead><tbody>';
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $orders = Orders::whereUserId($user_id)->whereOrderConfirm(1)->where('status',3)->get();
            foreach ($orders as $order) {
                $html .= '<tr><td>#'.$order->invoice_number.'</td><td>'.$order->created_at.'</td><td>$ '.$order->amount.'</td><td>';
                $html .= '<span class="label status_nuevo"><i class="fa fa-check-square-o"></i> Delivered</span>';

                $url = url('/mi-perfil-detalle-pedido/')."/".$order->invoice_number;
                $html .= '</td><td class="text-right"><a class="btn btn-mini" href="'.$url.'"><i class="fa fa-search"></i> Ver Detalle</a></td></tr>';
            }
        }else{

        }
        $html .= '</tbody></table>';
        echo $html;
    }

    public static function MexiPuntos(){
        $html = '<table><table class="table table-hover"><thead><tr><th>Pedido No.</th><th>Fecha</th><th>Total</th><th>MexiPuntos</th><th>&nbsp;</th></tr></thead><tbody>';
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $orders = Orders::whereUserId($user_id)->whereOrderConfirm(1)->where('payment_type','mexipuntos')->where('status','!=',3)->get();
            foreach ($orders as $order) {
                $html .= '<tr><td>'.$order->invoice_number.'</td><td>'.$order->created_at.'</td><td>$ '.$order->amount.'</td><td>';
                $html .= '<span class="label status_nuevo"><i class="fa fa-check-square-o"></i> Delivered</span>';

                $url = url('/mi-perfil-detalle-pedido/')."/".$order->invoice_number;
                $html .= '</td><td class="text-right"><a class="btn btn-mini" href="'.$url.'"><i class="fa fa-search"></i> Ver Detalle</a></td></tr>';
            }
        }else{

        }
        $html .= '</tbody></table>';
        echo $html;
    }
    
}
