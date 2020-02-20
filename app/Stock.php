<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы stocks
 * | Таблица хранит new и discount значения для товаров products
 * | 
 *************/

class Stock extends Model
{
    //
    protected $fillable = [
        'product_id',
        'stock',
        'percent',
        'price'
    ];
}
