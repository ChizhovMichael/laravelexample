<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель продукта/ таблицы products
 * | fillable для проверки заполняемых полей. Не забывать редактировать если 
 * | название полей в таблице изменяется
 * | 
 * | Регулировка подключения дополнительных таблиц к products
 * | belongsTo('App\Company', 'company_id'), где 1 - Модель (присоединяемая таблица) id, 2 - столбец из Product
 * | hasMany('App\Company', 'company_id'), где 1 - Модель (присоединяемая таблица), 2 - столбец из этой модели с id Product
 * | 1. Set Products (Получаем содержимое комплекта)
 * | 2. Select All Info (Получаем вю сопутствующую информацию по продукции)
 * | 3. Get Set Products (Получаем содержимое комплекта в виде массива)
 * | 4. Get Set Products (Получаем содержимое комплекта)
 * | 3. Get Products Item (Получаем информацию о продукте)

 **************/

class Set extends Model
{
    //
    protected $fillable = [
        'set_name',
        'set_cost',
        'set_img',
    ];

    /**********
     * | Set Products
     * | Получаем содержимое комплекта
     ***************/
    public function scopeSetProduct($query, $param)
    {
        return $query->join('set_products', 'set_products.set_id', '=', 'sets.id')
            ->where('product_id', '=', $param);
    }


    /**
     * | SelectAllInfo
     * | Получаем вю сопутствующую информацию по продукции
     */
    public function scopeSelectAllInfo($query)
    {
        return $query->select([
            'sets.id',
            'sets.set_name',
            'sets.set_cost',
            'sets.set_img',
            'sets.set_count',
            'sets.set_comment',
            'sets.set_full_cost',
            'set_products.set_id',
            'set_products.product_id',
            'set_products.product_count',
            'products.part_model',
            'products.company_id',
            'products.part_link',
            'products.tv_id',
            'companies.company',
            'part_imgs.part_img_name',
            'part_types.parttype_type',
            'tvs.tv_model'
        ]);
    }

    /**********
     * | Get Set Products
     * | Получаем содержимое комплекта в виде массива
     ***************/
    public function get_set_products()
    {
        return $this->hasMany('App\SetProduct');
    }
    

    /**
     * | Get Set Products 
     * | Получаем содержимое комплекта
     */
    public function scopeGetSetProducts($query)
    {
        return $query->join('set_products', 'set_products.set_id', '=', 'sets.id');
    }

    /**********
     * | Get Products Item
     * | Получаем информацию о продукте
     ***************/
    public function scopeGetProductsItem($query)
    {
        return $query->join('products', 'products.id', '=', 'set_products.product_id')
        ->join('companies', 'companies.id', '=', 'products.company_id')
        ->join('tvs', 'tvs.id', '=', 'products.tv_id')
        ->join('part_types', 'part_types.id', '=', 'products.parttype_id')
        ->leftJoin('part_imgs', function ($join) {
            $join->on('part_imgs.product_id', '=', 'products.id')
                ->where('part_img_main', '=', '1');
        });
    }


}
