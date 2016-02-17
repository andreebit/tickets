<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function index()
    {
        $carts = \App\Cart::whereUserId($this->user()->id)->get();
        if (!count($carts)) {
            return redirect()->back();
        }
        return view('site.cart.index', compact('carts'));
    }

    public function add($priceId)
    {
        $cart = \App\Cart::whereUserIdAndPriceId($this->user()->id, $priceId)->first();
        if (is_null($cart)) {
            $cart = new \App\Cart();
            $cart->price_id = $priceId;
            $cart->user_id = $this->user()->id;
            $cart->quantity = 1;
        } else {
            $cart->quantity = $cart->quantity + 1;
        }
        $cart->save();
        return redirect()->back();
    }

    public function delete($cartId)
    {
        $cart = \App\Cart::find($cartId)->delete();
        return redirect()->back();
    }

}
