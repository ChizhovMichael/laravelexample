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
 * | 1. Company (таблица компаний)
 * | 2. Part_types (таблица part_types)
 * | 3. Part_img (таблица part_imgs)
 * | 4. Part_img_main (таблица part_imgs)
 * | 5. Tv (таблица Tv)
 * | 6. Stock (таблица stocks)
 * | 7. SelectAllInfo (получаем значения соответствующих столбцов)
 * | 7.1 SelectAllInfoWithoutMainImg (Получаем вю сопутствующую информацию по продукции без главного изображения для /артикл )
 * | 8. SelectProductWithCategories (получение дополнительных таблиц для каталога товаров)
 * | 9. WhereStock (Получаем сортировку по стоковому товару)
 * | 10. WhereBrands (Получаем сортировку по выделенным checkbox брендов)
 * | 11. WherePriceMore (Получаем сортировку по минимальной цене)
 * | 12. WherePriceLess (Получаем сортировку по максимальной цене)
 * | 13. GetImgMain (Получаем главное изображение для каталога продукции)
 * | 14. TV images (Получаем изображения телевизора)
 * | 15. Matrix (Получаем матрицу телевизора)
 **************/


class Product extends Model
{
    //
    protected $fillable = [
        'part_model',
        'part_comment',
        'part_comment_for_client',
        'part_link',
        'part_cost',
        'part_count',
        'parttype_id',
        'ebay_id',
        'matrix_id',
        'tv_id',
        'company_id',
        'part_status',
        'part_for_elements',
        'part_return',
        'part_condition',
        'group_id',
        'searched_keyword',
        'primaryCategory',
        'itemTitle',
        'itemDescription',
        'startPrice',
        'listingDuration',
        'itemID',
        'siteID'
    ];

    /**********
     * | Company
     * | Получаем компанию которая принадлежит данному продукту
     ***************/
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    /**
     * | Part_types
     * | Получаем тип продукта
     */
    public function part_type()
    {
        return $this->belongsTo('App\PartType', 'parttype_id');
    }

    /**
     * | Part_img
     * | Получаем изображения продукта
     */
    public function part_img()
    {
        return $this->hasMany('App\PartImg', 'product_id');
    }

    /**
     * | Part_img_main
     * | Получаем главное изображение продукта
     */
    public function part_img_main()
    {
        return $this->hasMany('App\PartImg', 'product_id')->where('part_img_main', 1);
    }


    /**
     * | Tv
     * | Получаем телевизор продукта
     */
    public function tv()
    {
        return $this->belongsTo('App\Tv', 'tv_id');
    }


    /**
     * | Stock
     * | Получаем категорию товара новый/ не новый
     */
    public function stock()
    {
        return $this->hasMany('App\Stock', 'product_id');
    }


    /**
     * | SelectAllInfo
     * | Получаем вю сопутствующую информацию по продукции
     */
    public function scopeSelectAllInfo($query)
    {
        return $query->select([
            'products.id',
            'products.part_cost',
            'products.part_model',
            'products.company_id',
            'products.part_link',
            'products.part_count',
            'products.tv_id',
            'companies.company',
            'part_imgs.part_img_name',
            'part_types.parttype_type',
            'tvs.tv_model',
            'stocks.stock',
            'stocks.percent',
            'stocks.price'
        ]);
    }

    /**
     * | SelectAllInfoWithoutMainImg
     * | Получаем вю сопутствующую информацию по продукции без главного изображения
     */
    public function scopeSelectAllInfoWithoutMainImg($query)
    {
        return $query->select([
            'products.id',
            'products.part_cost',
            'products.part_model',
            'products.company_id',
            'products.part_link',
            'products.part_count',
            'products.tv_id',
            'products.matrix_id',
            'products.part_comment_for_client',
            'products.part_status',
            'companies.company',
            'part_types.parttype_type',
            'tvs.tv_model',
            'stocks.stock',
            'stocks.percent',
            'stocks.price'
        ]);
    }



    /**
     * | SelectProductWithCategories
     * | Получаем все соответсвующие таблицы для продукта в которых содержится дополнительная информация
     */

    public function scopeSelectAllTable($query)
    {
        return $query->join('companies', 'companies.id', '=', 'products.company_id')
            ->join('tvs', 'tvs.id', '=', 'products.tv_id')
            ->join('part_types', 'part_types.id', '=', 'products.parttype_id')
            ->leftJoin('stocks', 'stocks.product_id', '=', 'products.id');
    }


    /**
     * | WhereStock
     * | Получаем сортировку по стоковому товару
     */
    public function scopeWhereStock($query, $param)
    {
        if ($query->whereNotNull('stocks.stock')) {
            if ($query->where('stocks.stock', $param)->exists()) {
                return $query->where('stocks.stock', '=', $param);
            } else {
                return $query;
            }
        } else {
            return $query;
        }
    }

    /**
     * | WhereBrands
     * | Получаем сортировку по выделенным checkbox брендов
     */
    public function scopeWhereBrands($query, $param)
    {
        return $query->whereIn('companies.company', $param);
    }

    /**
     * | WherePriceMore
     * | Получаем сортировку по минимальной цене
     */
    public function scopeWherePriceMore($query, $param)
    {
        return $query->where('products.part_cost', '>=', $param);
    }
    /**
     * | WherePriceLess
     * | Получаем сортировку по максимальной цене
     */
    public function scopeWherePriceLess($query, $param)
    {
        return $query->where('products.part_cost', '<=', $param);
    }



    /**
     * | GetImgMain
     * | Получаем главное изображение для каталога продукции
     */
    public function scopeGetImgMain($query)
    {
        return $query->join('part_imgs', function ($join) {
            $join->on('part_imgs.product_id', '=', 'products.id')
                ->where('part_img_main', '=', '1');
        });
    }

    /**
     * | TV images
     * | Получаем изображения телевизора
     */

     public function tv_img()
     {
        return $this->hasMany('App\TvImg', 'tv_id', 'tv_id');
     }

     /**
     * | Matrix
     * | Получаем матрицу телевизора
     */
     public function matrix()
     {
        return $this->belongsTo('App\Matrix', 'matrix_id');
     }
}
