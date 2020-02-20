<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы slider_imgs
 * | Таблица хранит пути изображений для слайдеров 
 * | component sliderheader.blade.php используется на welcome, prooduct, set
 *************/


class SliderImg extends Model
{
    //
    protected $fillable = [
        'slide',
        'type',
        'position'
    ];
}
