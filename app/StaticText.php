<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы static_texts
 * | Таблица хранит статический текст, типа доставка и т.д
 * | 
 *************/

class StaticText extends Model
{
    //
    protected $fillable = [
        'name',
        'value'
    ];
}
