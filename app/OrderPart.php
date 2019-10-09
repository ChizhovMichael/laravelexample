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
 * | 1. SelectPartInfo (Получаем вcю сопутствующую информацию по продукции)
 * | 2. GetImgMain (Получаем главное изображение для каталога продукции)
 * 
 * 
***************/

class OrderPart extends Model
{
    //
    protected $fillable = [
        'part_id',
        'order_status',
        'opart_return',
        'part_cancel',
        'order_count',
        'payment_status',
        'order_id',
        'time'
    ];

    public $timestamps = false;

    /**
     * | SelectPartInfo
     * | Получаем вcю сопутствующую информацию по продукции
     */
    public function scopeSelectPartInfo($query)
    {
        return $query->select([
            'order_parts.id',
            'order_parts.part_id',
            'order_parts.order_status',
            'order_parts.part_return',
            'order_parts.part_cancel',
            'order_parts.order_count',
            'order_parts.payment_status',
            'order_parts.order_id',
            'part_imgs.part_img_name', 
            'products.part_model',
            'products.part_link',
            'products.part_cost',
            'products.part_count',
            'products.company_id',
            'products.tv_id', 
            'box_parts.box_box',  
        ]);
    }

    /**
     * | Get Product Info
     * | Подключаем таблицу продукции для получения характеристик продукта
     */
    public function scopeGetProductInfo($query)
    {
        return $query->join('products', 'order_parts.part_id', '=', 'products.id');
    }

    /**
     * | GetImgMain
     * | Получаем главное изображение для каталога продукции
     */
    public function scopeGetImgMain($query)
    {
        return $query->leftJoin('part_imgs', function ($join) {
            $join->on('part_imgs.product_id', '=', 'order_parts.part_id')
                ->where('part_img_main', '=', '1');
        });
    }
    
    /**
     * GetBox
     * Получаем коробку в которой находится продукт
     */
    public function scopeGetBox($query)
    {
        return $query->leftJoin('box_parts', 'box_parts.part_id', '=', 'order_parts.part_id');

    }

    public function get_product() 
    {
        return $this->belongsTo('App\Product', 'part_id');
    }
}
