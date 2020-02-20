<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель навигации/ таблицы navigations
 * | fillable для проверки заполняемых полей. Не забывать редактировать если 
 * | название полей в таблице изменяется
 * | 
 * | Регулировка подключения дополнительных таблиц к products
 * | belongsTo('App\Company', 'company_id'), где 1 - Модель (присоединяемая таблица) id, 2 - столбец из Product
 * | hasMany('App\Company', 'company_id'), где 1 - Модель (присоединяемая таблица), 2 - столбец из этой модели с id Product
 * | 1. Get Navigation Additional Categories (Получаем подкатегории для таблицы navigations)
 * | 2. Get Navigation Categories (Получаем все категории из таблицы навигации для отображения товар по категориям и подкатегория)
 **************/

class Navigation extends Model
{
    //Столбцы
    protected $fillable = [
        'name',
        'slug',
        'show'
    ];


    /**********
     * | Get Navigation Additional Categories
     * | Получаем подкатегории для таблицы navigations
     *************/
    public function navigation_items()
    {
        return $this->hasMany('App\NavigationAdditional');
    }

    /**********
     * | Get Navigation Categories
     * | Получаем все категории из таблицы дополнительной навигации для отображения товар по категориям и подкатегория
     * | Работает совместно c NAvigation и get параметром для navigations
     *************/
    public function scopeGetNavigationCategories($query, $param)
    {
        return $query->join('navigation_additionals', 'navigation_additionals.navigation_id', '=', 'navigations.id')
            ->selectRaw('count(*) AS cnt, additional_id')->groupBy('additional_id')
            ->where('navigations.slug', '=', $param)
            ->orWhere('navigation_additionals.additional_slug', '=', $param)
            ->orderBy('cnt', 'DESC');
    }
}
