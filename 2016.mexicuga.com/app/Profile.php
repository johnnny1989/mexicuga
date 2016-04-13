<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'lastname',
        'maternalname',
        'phone',
        'mobile',
        'company',
        'webpage',
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
        'mexipuntos',
        'status'
    ];
}
