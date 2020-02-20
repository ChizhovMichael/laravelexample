<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы part_imgs
 *
 **********/

class PartImg extends Model
{
    //Столбцы
    protected $fillable = [
        'part_img_name', 
        'part_id',
        'part_img_main'
    ];
}
