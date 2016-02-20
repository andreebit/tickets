<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $email = $request->get('email', '');
        $password = $request->get('password', '');

        if (\Auth::once(['email' => $email, 'password' => $password])) {
            return response()->json(['status' => 'success', 'message' => '', "data" => ['email' => $email, 'token' => \Auth::user()->token, 'name' => \Auth::user()->name]]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Email o contraseña incorrectos', "data" => ['email' => $email, 'password' => $password]]);
        }
    }

}
