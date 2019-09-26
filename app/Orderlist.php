<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderlist extends Model
{
    //
    protected $fillable = [
        'order_status',
        'order_return',
        'order_payment',
        'order_lname',
        'order_tracking',
        'order_fname',
        'order_mname',
        'order_country',
        'order_delivery',
        'order_region',
        'order_autonomous',
        'order_district',
        'order_city',
        'order_address',
        'order_index',
        'order_email',
        'order_phone',
        'order_comment',
        'order_timestamp',
        'paymethod'
    ];

    public $timestamps = false;
}
