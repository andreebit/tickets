<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request) {
        $user = \Auth::user();
        if(!is_null($user)) {
            return redirect(route('home.index'));
        }

        if($request->method() == 'POST') {
            if(\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                return redirect(route('home.index'));
            } else {
                return redirect(route('user.login'))->with('error_login', true);
            }
        } else {
            return view('site.user.login');
        }
    }

    public function register(Request $request) {
        $user = \Auth::user();
        if(!is_null($user)) {
            return redirect(route('home.index'));
        }

        if($request->method() == 'POST') {
            try {
                $user = new User();
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->password = \Hash::make($request->get('password'));
                $user->token = uniqid('', true);
                $user->save();
                return redirect(route('user.login'));
            } catch (\Exception $exception) {
                return redirect(route('user.register'))->with('error_register', true);
            }
        } else {
            return view('site.user.register');
        }
    }

    public function autologin()
    {
        \Auth::attempt(['email' => 'andree.bit@gmail.com', 'password' => '123456']);
        return redirect()->back();
    }

    public function logout()
    {
        \Auth::logout();
        return redirect(route('user.login'));
    }

    public function orders()
    {
        $orders = $this->user()->orders()->withData()->withTickets()->orderBy('id', 'DESC')->get();
        return view('site.user.orders', compact('orders'));
    }

}
