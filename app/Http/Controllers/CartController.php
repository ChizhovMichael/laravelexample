<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NavigationController;
use Cart;

class CartController extends Controller
{
    //
    use NavigationController;

    public function getPage()
    {
        return view('page/cart', [
            'navigations'       =>  $this->navigation(),
            'cart'              =>  $this->getCartCount(),
            'cartContent'       =>  Cart::content(),
        ]);
    }
}
