<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы tvs
 * | Таблица хранит информацию по телевизорам
 * | 1. Get Matrix (Получаем содержимое таблицы с матрицами)
 *************/

class Tv extends Model
{
    //
    protected $fillable = [
        'tv_model', 
        'tv_condition',
        'group_id', 
        'tv_comment',
        'corp_id', 
        'tv_warehouse',
        'tv_config', 
        'part_count',
        'tv_datetime', 
        'tv_timestamp',
    ];

    /**********
     * | Get Matrix
     * | Получаем содержимое таблицы с матрицами
     ***************/
    public function get_matrix()
    {
        return $this->hasOne('App\Matrix', 'tv_id');
    }

    /**
     * Отключаем добавление даты в таблицу
     */
    public $timestamps = false;
}
