<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    public function index()
    {
        $carts = \App\Cart::whereUserId($this->user()->id)->get();
        if (!count($carts)) {
            return redirect(route('home.index'));
        }
        return view('site.checkout.index', compact('carts'));
    }

}
