<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NavigationController;

class ContactController extends Controller
{
    //

    use NavigationController;

    public function getPage() {

        return view('page/contacts', [
            'navigations'       =>  $this->navigation(),
            'cart'              =>  $this->getCartCount(),
        ]);
    }
}
