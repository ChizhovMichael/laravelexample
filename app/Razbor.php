<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы razbors
 * | Пока хз для чего она
 *************/

class Razbor extends Model
{
    // Столбцы user_id не учитывается, заглушка 1, потому что хз для чего вообще эта таблица
    protected $fillable = [
        'tv_count',
        'user_id',
        'datetime'
    ];
}
