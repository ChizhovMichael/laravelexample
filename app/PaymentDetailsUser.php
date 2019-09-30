<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetailsUser extends Model
{
    //
    protected $fillable = [
        'user_id',
        'name',
        'secondname',
        'addname',
        'delivery',
        'country',
        'zipcode',
        'region',
        'autonomous',
        'district',
        'city',
        'address',
        'phone',
        'email',
        'comment'
    ];
}
