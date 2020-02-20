<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы navigation_additionals
 *
 **********/

class NavigationAdditional extends Model
{
    // Столбцы
    protected $fillable = [
        'navigation_id',
        'additional_id',
        'additional_name',
        'additional_slug',
        'show'
    ];
}
