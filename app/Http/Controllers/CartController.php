<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\NavigationController;
use App\Orderlist;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\OrderPart;



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

        $checkout = Cart::content();


        $contact['order_lname'] = $request->secondname;
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

        
        $order = new Orderlist();

        $order->order_status = 0;
        $order->order_return = 0;
        $order->order_payment = 0;
        $order->order_lname = $contact['order_lname'];
        $order->order_tracking = '';
        $order->order_fname = $contact['order_fname'];
        $order->order_mname = $contact['order_mname'];
        $order->order_country = $contact['order_country'];
        $order->order_delivery = $contact['order_delivery'];
        $order->order_region = $contact['order_region'];
        $order->order_autonomous = $contact['order_autonomous'];
        $order->order_district = $contact['order_district'];
        $order->order_city = $contact['order_city'];
        $order->order_address = $contact['order_address'];
        $order->order_index = $contact['order_index'];
        $order->order_email = $contact['order_email'];
        $order->order_phone = $contact['order_phone'];
        $order->order_comment = $contact['order_comment'];
        $order->order_timestamp = strtotime(Carbon::now());
        $order->paymethod = $contact['paymethod'];

        $order->save(); 
        

        $orderPart = new OrderPart();

        
        foreach ($checkout as $item) {

            $orderPart = new OrderPart();
            $orderPart->part_id = $item->id;
            $orderPart->order_status = $order->order_status;
            $orderPart->part_return = $order->order_return;
            $orderPart->part_cancel = 0;
            $orderPart->order_count = $item->qty;
            $orderPart->payment_status = 0;
            $orderPart->order_id = $order->id;
            $orderPart->time = strtotime(Carbon::now());
            $orderPart->save();

        }





        // Вывод сообщения об удачной отправке
        // Отправка сообщения клиенту с реквизитами
        // Очистка корзины после отправки

        return redirect()->back()->with('success', '<script>alert("Hello")</script>');
    }
}
