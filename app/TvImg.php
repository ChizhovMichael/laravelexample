<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы tv_imgs
 * | Таблица хранит информацию по зображениям продуктов
 * | 
 *************/

class TvImg extends Model
{
    //
    protected $fillable = [
        'tv_img_name',
        'tv_id'
    ];
}
