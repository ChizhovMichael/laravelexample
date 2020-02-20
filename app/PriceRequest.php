<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы price_requests
 * | Нашли дешевле?
 **********/

class PriceRequest extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'url'
    ];
}
