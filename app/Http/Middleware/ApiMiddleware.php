<?php

namespace App\Http\Middleware;

use Closure;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $apiKey = $request->get('api_key', '');
        if (!empty($apiKey) && $apiKey == env('API_KEY')) {
            return $next($request);
        } else {
            return response()->json(['status' => 'error', 'message' => 'error de api_key']);
        }
    }
}
