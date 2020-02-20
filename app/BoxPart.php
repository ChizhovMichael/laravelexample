<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/*************
 * Модель таблицы box_parts
 * 1. Get Product (Получаем название запчасти, которая находится в короке)
 * 2. Get Product Unsort (Получаем название запчасти, которая находится в короке 0 (несортированное))
 * 3. Get Product 20 (Получаем содержиоме 20 коробки)
 *************/
class BoxPart extends Model
{
    //Столбцы
    protected $fillable = [
        'part_id',
        'box_box',
        'box_hide',
        'box_timestamp'
    ];

    /**
     * Get Product
     * Получаем название запчасти, которая находится в короке
     */
    public function get_product()
    {
        return $this->hasOne('App\Product', 'id', 'part_id')->select([
            'id',
            'part_model'
        ]);
    }

    /**
     * Get Product Unsort
     * Получаем название запчасти, которая находится в короке 0 (несортированное)
     */
    public function get_product_unsort()
    {
        return $this->hasOne('App\Product', 'id', 'part_id')->select([
            'id',
            'part_model',
            'parttype_id',
            'tv_id'
        ]);
    }

    /**
     * Get Product 20 
     * Получаем содержиоме 20 коробки
     */
    public function get_product_20()
    {
        return $this->hasOne('App\Product', 'id', 'part_id')->select([
            'id',
            'part_model',
            'company_id'
        ]);
    }
}
