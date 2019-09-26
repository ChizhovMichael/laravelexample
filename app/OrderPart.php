<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPart extends Model
{
    //
    protected $fillable = [
        'part_id',
        'order_status',
        'opart_return',
        'part_cancel',
        'order_count',
        'payment_status',
        'order_id',
        'time'
    ];

    public $timestamps = false;
}
