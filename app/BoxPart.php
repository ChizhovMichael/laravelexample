<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/*************
 * 1. Get Product (Получаем название запчасти, которая находится в короке)
 * 2. Get Product Unsort (Получаем название запчасти, которая находится в короке 0 (несортированное))
 *************/
class BoxPart extends Model
{
    //
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
}
