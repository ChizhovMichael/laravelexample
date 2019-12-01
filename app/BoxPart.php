<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/*************
 * 1. Get Product (Получаем название запчасти, которая находится в короке)
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
}
