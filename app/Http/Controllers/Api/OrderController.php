<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class OrderController extends Controller
{
    public function index(Request $request) {
        $userToken = $request->get('user_token', '');
        
        if(empty($userToken)) {
            return response()->json(['status' => 'error', 'message' => 'user_token necesario']);
        }
        
        $user = User::whereToken($userToken)->first();
        
        if (!is_null($user)) {            
            
            $orders = $user->orders()
                    ->whereStatus('success')
                    ->select('id', \DB::raw('CONCAT("PED", LPAD(id, 10, 0)) as number'), 'date_time')
                    ->get();
            
            return response()->json(['status' => 'success', 'message' => '', 'data' => $orders]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'no se encontró usuario con el token especificado']);
        }
    }
}
