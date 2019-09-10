<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NavigationController;

/*************
 * | Контролер продукта/ таблицы products
 * | fillable для проверки заполняемых полей. Не забывать редактировать если 
 * | название полей в таблице изменяется
 * | 
 * | 1. Get Page Contact (Получаем страницы контактов /contacts)
 * | 2. Get Page Delivery (Получаем страницы доставки /delivery)
 * | 3. 
 **************/

class ContactController extends Controller
{
    //

    use NavigationController;


    /**
     * Get Page Contact
     * Получаем страницы контактов /contacts
     */
    public function getPageContact() {

        return view('page/contacts', [
            'navigations'       =>  $this->navigation(),
            'cart'              =>  $this->getCartCount(),
        ]);
    }

    /**
     * Get Page Delivery
     * Получаем страницы доставки /delivery
     */
    public function getPageDelivery() {

        return view('page/delivery', [
            'navigations'       =>  $this->navigation(),
            'cart'              =>  $this->getCartCount(),
        ]);
    }


    /**
     * Get Page Private
     * Получаем страницы политики конфиденциальности /private
     */
    public function getPagePrivate() {

        return view('page/private', [
            'navigations'       =>  $this->navigation(),
            'cart'              =>  $this->getCartCount(),
        ]);
    }



    /**
     * Get Page Regulations
     * Получаем страницы политики конфиденциальности /regulations
     */
    public function getPageRegulations() {

        return view('page/regulations', [
            'navigations'       =>  $this->navigation(),
            'cart'              =>  $this->getCartCount(),
        ]);
    }
}
