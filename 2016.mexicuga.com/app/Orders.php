<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected  $table = "orders";

    protected $fillable = [
        'user_id',
        'order_description',
        'payer_id',
        'payment_type',
        'token',
        'invoice_number',
        'amount',
        'latitude',
        'longitude',
        'currency',
        'ship_cp',
        'ship_street',
        'ship_noext',
        'ship_noint',
        'ship_colony',
        'ship_muncipility',
        'ship_state',
        'reference',
        'optradio',
        'bill_name',
        'bill_rfc',
        'bill_cp',
        'bill_street',
        'bill_noext',
        'bill_noint',
        'bill_colony',
        'bill_muncipility',
        'bill_state',
        'status',
        'order_confirm'
    ];

    protected $primaryKey = "order_id";

  public function getCart(){
      return $this->hasMany('App\Cart','order_id');
  }

}
