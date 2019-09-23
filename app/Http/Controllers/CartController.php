<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NavigationController;
use App\Product;
use Cart;

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
            'zipcode'   => 'numeric|max:7',
            'region'    => 'max:32',
            'autoregion' => 'max:32',
            'district' => 'max:32',
            'city' => 'max:30',
            'address' => 'required',
            'tel' => 'numeric',
            'email' => 'required|email',
        ]);
    
        


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


        return $contact;
    }
}
