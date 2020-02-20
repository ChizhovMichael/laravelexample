<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы boxes
 *
 **********/

class Box extends Model
{
    // Столбцы
    protected $fillable = [
        'boxes_number',
        'boxes_name',
        'boxes_description'
    ];


    /**
     * Отключаем добавление даты в таблицу created_at, update_at (системные laravel)
     */
    public $timestamps = false;
}
