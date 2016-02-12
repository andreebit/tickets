<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function autologin()
    {
        \Auth::attempt(['email' => 'juanperez@upc.edu.pe', 'password' => '123456']);
        return redirect()->back();
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->back();
    }

}
