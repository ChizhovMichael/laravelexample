<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы contacts
 *
 **********/

class Contact extends Model
{
    // Столбцы
    protected $fillable = [
        'name',
        'status',
        'value'
    ];
}
