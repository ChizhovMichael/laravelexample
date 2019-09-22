<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NavigationController;


class AboutController extends Controller
{
    //
    use NavigationController;

    public function index() {

        return view('page/about', [
            'navigations'       =>  $this->navigation(),
            'contacts'          => collect($this->contacts()),
            'cart'              =>  $this->getCartCount(),
        ]);
    }
}
