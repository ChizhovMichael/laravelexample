<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы sales
 * | Продажи
 *************/

class Sale extends Model
{
    //
    protected $fillable = [
        'sales_year',
        'sales_month',
        'sales_turnover',
        'sales_orders',
        'group_id'
    ];
    /**
     * Отключаем добавление даты в таблицу
     */
    public $timestamps = false;

}
