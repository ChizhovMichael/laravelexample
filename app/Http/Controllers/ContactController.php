<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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
            'contacts'          => collect($this->contacts()),
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
            'contacts'          => collect($this->contacts()),
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
            'contacts'          => collect($this->contacts()),
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
            'contacts'          => collect($this->contacts()),
            'cart'              =>  $this->getCartCount(),
        ]);
    }


    /**
     * Push form from contacts page
     * Отправка формы со страницы контакты
     */
    public function mailpost( Request $request )
    {

        $contact['name'] = $request->name;
        $contact['email'] = $request->email;
        $contact['tel'] = $request->tel;
        $contact['message'] = $request->message;

        // Mail delivery logic goes here
        Mail::to(config('mail.support.address'))->send(new ContactEmail($contact));

        flash('Your message has been sent!')->success();

        return redirect()->route('contact.create');

    }
}
