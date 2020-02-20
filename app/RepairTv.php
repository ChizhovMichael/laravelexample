<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы repair_tvs
 * | Реанимация в админ панеле
 *************/

class RepairTv extends Model
{
    //
    protected $fillable = [
        'repair_tv_corp_id',
        'repair_tv_model',
        'repair_tv_defect',
        'repair_tv_comment',
        'repair_tv_looking_part_model'
    ];

    /**
     * Отключаем добавление даты в таблицу
     */
    public $timestamps = false;
}
