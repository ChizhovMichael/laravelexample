<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\NavigationController;
use App\Orderlist;
use Cart;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    //
    use NavigationController;

    public function getPage()
    {
        return view('page/cart', [
            'navigations'       =>  $this->navigation(),
            'contacts'          => collect($this->contacts()),
            'cart'              =>  $this->getCartCount(),
            'cartContent'       =>  Cart::content(),
        ]);
    }


    public function destroyProduct( $cart_id )
    {
        Cart::remove($cart_id);

        return redirect()->route('cart');
    }

    public function checkout()
    {
        
        return view('page/checkout', [
            'navigations'       =>  $this->navigation(),
            'contacts'          => collect($this->contacts()),
            'cart'              =>  $this->getCartCount(),
            'cartContent'       =>  Cart::content(),
        ]);

    }

    public function checkoutPost(Request $request)
    {

        $request->validate([
            'firstname' => 'required|max:255',
            'secondname' => 'required|max:255',
            'addname'   => 'required|max:255',
            'delivery'  => 'numeric',
            'country'    => 'numeric',
            'region'    => 'max:32',
            'autoregion' => 'max:32',
            'district' => 'max:32',
            'city' => 'max:30',
            'address' => 'required',
            'email' => 'required|email'
        ]);
    
        if ( !$request->paymethod )
            return Redirect::back()->withInput($request->input())
                                ->with('paymethod', 'Выберете способ оплаты');


        $contact['order_status'] = 0;
        $contact['order_return'] = 0;
        $contact['order_payment'] = 0;
        $contact['order_lname'] = $request->secondname;
        $contact['order_tracking'] = '';
        $contact['order_fname'] = $request->firstname;
        $contact['order_mname'] = $request->addname;
        $contact['order_country'] = $request->country;
        $contact['order_delivery'] = $request->delivery;
        $contact['order_region'] = $request->region;
        $contact['order_autonomous'] = $request->autoregion;
        $contact['order_district'] = $request->district;
        $contact['order_city'] = $request->city;
        $contact['order_address'] = $request->address;
        $contact['order_index'] = $request->zipcode;
        $contact['order_email'] = $request->email;
        $contact['order_phone'] = $request->tel;
        $contact['order_comment'] = $request->message;
        $contact['paymethod'] = $request->paymethod;
        

        // Sending Mail
        Mail::to('foo@example.com')->send(new OrderEmail($contact));

        

        Orderlist::create([
            'order_status' => $contact['order_status'],
            'order_return' => $contact['order_return'],
            'order_payment' => $contact['order_payment'],
            'order_lname' => $contact['order_lname'],
            'order_tracking' => $contact['order_tracking'],
            'order_fname' => $contact['order_fname'],
            'order_mname' => $contact['order_mname'],
            'order_country' => $contact['order_country'],
            'order_delivery' => $contact['order_delivery'],
            'order_region' => $contact['order_region'],
            'order_autonomous' => $contact['order_autonomous'],
            'order_district' => $contact['order_district'],
            'order_city' => $contact['order_city'],
            'order_address' => $contact['order_address'],
            'order_index' => $contact['order_index'],
            'order_email' => $contact['order_email'],
            'order_phone' => $contact['order_phone'],
            'order_comment' => $contact['order_comment'],
            'paymethod' => $contact['paymethod']
        ]);



        // Добавление товара в базу
        // Шаблон страницы сообщения
        // Валидация в OrderformRequest
        // Вывод сообщения об удачной отправке
        // Отправка сообщения клиенту с реквизитами

        return $contact;
    }
}
