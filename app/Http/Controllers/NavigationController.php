<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navigation;
use App\Product;
use App\Contact;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\StaticText;

/***************
 * Навигационный раздел
 * 1. Навигация
 * 2. Вывод всех брендов в зависимости от количества товаров
 * 3. Получаем список контактов
 * 4. adminDetect (Определяем в системе администратора)
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


    /**
     * Get Contacts
     * Получаем контакты для футера и для головы
     */
    public function contacts()
    {
        $contacts = Contact::get();
        $phone = $contacts->where('name', 'phone');
        $phoneMain = $phone->where('status', 1)->first();
        $address = $contacts->where('name', 'address');
        $mail = $contacts->where('name', 'email');
        $mailMain = $mail->where('status', 1)->first();

        return [
            'phone'     => $phone,
            'phoneMain' => $phoneMain,
            'address'   => $address,
            'mail'      => $mail,
            'mailMain'  => $mailMain
        ];
    }

    /**
     * adminDetect
     * Определяем в системе администратора
     */
    public function adminDetect()
    {

        if (Auth::user()) {

            $user = Auth::user();
        
            if ($user->type == 'admin') {
                $adminDetect = true;
            } else {
                $adminDetect = false;
            }

            return $adminDetect;
        }
    }

    /**
     * Static Text
     * Выводим статическую информацию
     */
    public function statictext()
    {
        $statictext = StaticText::get();
        $about = $statictext->where('name', 'about')->first();
        $delivery = $statictext->where('name', 'delivery')->first();
        $contacts = $statictext->where('name', 'contacts')->first();

        return [
            'about'     => $about,
            'delivery'  => $delivery,
            'contacts'  => $contacts
        ];
    }
}
