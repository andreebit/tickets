<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function autologin()
    {
        \Auth::attempt(['email' => 'andree.bit@gmail.com', 'password' => '123456']);
        return redirect()->back();
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->back();
    }

    public function orders()
    {
        $orders = $this->user()->orders()->withData()->withTickets()->orderBy('id', 'DESC')->get();
        return view('site.user.orders', compact('orders'));
    }

}
