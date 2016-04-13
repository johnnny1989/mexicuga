<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected  $table = "cart";

    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'name',
        'price',
        'priceid',
        'image',
        'code',
        'order_id'
    ];

    protected $primaryKey= 'cart_id';
}
