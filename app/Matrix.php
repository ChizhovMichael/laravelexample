<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы matrices
 *
 **********/

class Matrix extends Model
{
    //Столбцы
    protected $fillable = [
        'matrix_model',
        'tv_id',
        'matrix_timestamp'
    ];



    /**
     * Отключаем добавление даты в таблицу
     */
    public $timestamps = false;
}
