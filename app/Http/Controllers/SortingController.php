<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Функции сортировки
 * 1. Sorting - сортировка по названию, цене
 * 2. Stock  - сортировка по новинкам, акциям
 * 3. Brand - сортировка по брендам
 * 
 */

trait  SortingController
{
    //

    /**
     * Sorting
     * We get the sorting with updated GET parameters 
     * and span.innerText for products section
     */
    public function getSort($sort)
    {
        $sorting = array(
            ['nameAZ', 'По названию &darr;', 'part_model', 'asc'],
            ['nameZA', 'По названию &uarr;', 'part_model', 'desc'],
            ['priceLow', 'По цене &darr;', 'part_cost', 'asc'],
            ['priceHigh', 'По цене &uarr;', 'part_cost', 'desc']
        );


        if (!empty($sort)) {
            foreach ($sorting as $item) {
                if ($sort == $item[0]) {
                    $name = $item[0];
                    $value = $item[1];
                    $column = $item[2];
                    $sort = $item[3];
                }
            }
        } else {
            $name = NULL;
            $value = 'Сортировать';
            $column = 'products.id';
            $sort = 'asc';
        }



        $result['name'] = !isset($name) ? NULL : $name;
        $result['value'] = !isset($value) ? 'Сортировать' : $value;
        $result['column'] = !isset($column) ? 'products.id' : $column;
        $result['sort'] = !isset($sort) ? 'asc' : $sort;        
        $result['sorting'] = $sorting;

        return $result;
    }

    /**
     * Stock
     * We get the sort by the stock parameter with 
     * the updated GET parameters
     */
    public function getStock($stock)
    {
        
        if (!empty($stock)) {

            switch($stock) {
                case 'all':
                    $stock = NULL;
                    break;
                case 'new':
                    $stock = 'new';
                    break;
                case 'discount':
                    $stock = 'discount';
                    break;
                default:
                    $stock = NULL;
            }

        } else {
            $stock = NULL;
        }

        return $stock;    
    }


    /**
     * Получаем все бренды и записываем их в
     * Get параметр
     */
    public function getBrands($brands)
    {
        if ($brands !== NULL) {

            $brands = explode('_', $brands);
            $brands = $brands;

        } else {
            $brands = NULL;
        }

        return $brands;
    }

    /**
     * Получаем значение from для минимальной цены
     * при условии всех сортов
     */
    public function getFrom($from, $min)
    {
        if (!empty($from)) {
            $from = $from;
        } else {
            $from = $min;
        }

        return $from;
    }
    
    /**
     * Получаем значение to для максимальной цены
     * при условии все сортов
     */
    public function getTo($to, $max)
    {
        if (!empty($to)) {
            $to = $to;
        } else {
            $to = $max;
        }

        return $to;
    }
}
