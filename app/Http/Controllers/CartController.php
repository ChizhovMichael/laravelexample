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
}
