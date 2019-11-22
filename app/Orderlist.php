<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель продукта/ таблицы products
 * | fillable для проверки заполняемых полей. Не забывать редактировать если 
 * | название полей в таблице изменяется
 * | hasManyThrough (Конечная таблица, промежуточная таблица, внешн ключ промежуточной таблицы, внешн ключ в конечной таблице, ключ в данной таблице, ключ в промеж табл)
 * | 
 * | Регулировка подключения дополнительных таблиц к products
 * | belongsTo('App\Company', 'company_id'), где 1 - Модель (присоединяемая таблица) id, 2 - столбец из Product
 * | hasMany('App\Company', 'company_id'), где 1 - Модель (присоединяемая таблица), 2 - столбец из этой модели с id Product
 * | 1. Order Parts (Присоединяем таблицу order_parts и получаем значения по ключу id-prder_id)
 * | 2. Part Box (Определяем в какой коробце находится продукт)
 * | 3. Part Image (Получаем главное изображение продукта)
 * | 4. GetOrderParts (Получаем таблицу проданных продуктов)
 * | 5. get_part (Подключаем таблицу щквук_зфкеы и получаем соответствующие столбцы)
 * | 6. SelectInfoListItem (ПОлучаем информацию таблиц для листа заказов)

 **************/

class Orderlist extends Model
{
    //
    protected $fillable = [
        'order_status',
        'order_return',
        'order_payment',
        'order_lname',
        'order_tracking',
        'order_fname',
        'order_mname',
        'order_country',
        'order_delivery',
        'order_region',
        'order_autonomous',
        'order_district',
        'order_city',
        'order_address',
        'order_index',
        'order_email',
        'order_phone',
        'order_comment',
        'order_timestamp',
        'paymethod'
    ];

    public $timestamps = false;


    /**
     * | Order Parts
     * | Присоединяем таблицу order_parts и получаем значения по ключу id-prder_id
     */
    public function order_parts()
    {
        return $this->hasManyThrough('App\Product', 'App\OrderPart', 'order_id', 'id', 'id', 'part_id');
    }


    /** 
     * | Part Box
     * | Определяем в какой коробце находится продукт
     */
    public function part_box()
    {
        return $this->hasManyThrough('App\BoxPart', 'App\OrderPart', 'order_id', 'part_id', 'id', 'part_id');
    }

    /**
     * | Part Image
     * | Получаем главное изображение продукта
     */
    public function part_img()
    {
        return $this->hasManyThrough('App\PartImg', 'App\OrderPart', 'order_id', 'product_id', 'id', 'part_id')->where('part_img_main', 1);
    }

    /**
     * | GetOrderParts
     * | Получаем таблицу проданных продуктов
     */
    public function scopeGetOrderParts($query)
    {
        return $query->join('order_parts', 'order_parts.order_id', '=', 'orderlists.id');
    }


    /**
     * | get_part
     * | Подключаем таблицу щквук_зфкеы и получаем соответствующие столбцы
     */
    public function get_part()
    {
        return $this->hasMany('App\OrderPart', 'order_id')->select([
            'part_id', 
            'order_status', 
            'part_return',
            'part_cancel', 
            'order_id',
            'payment_status'
        ]);
    }


    /**
     * | SelectInfoListItem
     * | ПОлучаем информацию таблиц для листа заказов
     */
    public function scopeSelectInfoListItem($query)
    {
        return $query->select([
            'orderlists.id',
            'orderlists.order_status',
            'orderlists.order_lname',
            'orderlists.order_fname',
            'orderlists.order_mname',
            'orderlists.order_index',
            'orderlists.order_country',
            'orderlists.order_autonomous',
            'orderlists.order_region',
            'orderlists.order_city',
            'orderlists.order_district',
            'orderlists.order_address',
            'orderlists.order_email',
            'orderlists.order_timestamp',
            'orderlists.paymethod',
            'orderlists.order_delivery',
            'orderlists.order_tracking'
        ]);
    }
}
