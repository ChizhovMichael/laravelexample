<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRequest extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'url'
    ];
}
