<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/*************
 * | Модель таблицы skypkas
 * | Форма обратной связи для клиентов, которые готовы продать свои телевизоры на разбор skypka.blade.php
 *************/

class Skypka extends Model
{
    //
    protected $fillable = [
        'skypka_tv_model',
        'skypka_defect',
        'skypka_delivery_option',
        'skypka_user_adress',
        'skypka_cost',
        'skypka_self_cost',
        'skypka_email',
        'skypka_phone',
        'skypka_status'
    ];

    /**
     * Отключаем добавление даты в таблицу
     */
    public $timestamps = false;
}
