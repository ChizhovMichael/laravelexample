<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navigation;
use App\Product;
use Cart;

/***************
 * Навигационный раздел
 * 1. Навигация
 * 2. Вывод всех брендов в зависимости от количества товаров
 ***********/

trait NavigationController
{
    //

    /**
     * Navigation function to display 
     * categories of main and additional for different pages
     */
    public function navigation()
    {
        $navigations = Navigation::with('navigation_items')
            ->get();

        return $navigations;
    }

    public function getCartCount()
    {
        $cart_count = Cart::count();
        $cart_total = Cart::total();

        return array(
            'cart_count' => $cart_count,
            'cart_total' => $cart_total
        );
    }

    /**
     * Brand
     * Get All brand with sorting for count products
     * the updated GET parameters
     */
    public function getAllBrand($category)
    {
        $companies = Product::selectRaw('count(company_id) AS cnt, company')
            ->groupBy('company_id')
            ->orderBy('cnt', 'DESC')
            ->join('companies', 'products.company_id', '=', 'companies.id');

        if (is_string($category)) {
            $companies = $companies->where('part_model', 'LIKE', '%' . $category . "%");
        } else {
            $companies = $companies->where(function ($query) use ($category) {
                if ($category == NULL) {
                    $query->where('products.parttype_id', '!=', $category);
                } else {
                    $query->whereIn('products.parttype_id', $category);
                }
            });
        } 

        $companies = $companies->get();

        return $companies;
    }
}
