<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы part_types
 *
 **********/

class PartType extends Model
{
    //Столбцы
    protected $fillable = [
        'parttype_type', 
        'parttype_link',
    ];
}
