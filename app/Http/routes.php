<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

$prefix = 'api/v1';
Route::group(['namespace' => 'Api', 'prefix' => $prefix, 'middleware' => 'api.key'], function() {
    Route::post('/usuarios/acceder', ['as' => 'user.login', 'uses' => 'UserController@login']);
    Route::get('/orders', ['as' => 'order.index', 'uses' => 'OrderController@index']);
    Route::get('/tickets', ['as' => 'ticket.index', 'uses' => 'TicketController@index']);
    Route::get('/tickets/validar', ['as' => 'ticket.check', 'uses' => 'TicketController@check']);
});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::get('/c/{slug}', ['as' => 'events.list-by-category', 'uses' => 'EventsController@listByCategory']);
    Route::get('/e/{slug}', ['as' => 'events.show', 'uses' => 'EventsController@show']);
    Route::any('/iniciar-sesion', ['as' => 'user.login', 'uses' => 'UserController@login']);
    Route::any('/registro', ['as' => 'user.register', 'uses' => 'UserController@register']);
    Route::get('/acceder', ['as' => 'user.autologin', 'uses' => 'UserController@autologin']);
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/salir', ['as' => 'user.logout', 'uses' => 'UserController@logout']);
        Route::get('/carrito', ['as' => 'cart.index', 'uses' => 'CartController@index']);
        Route::get('/agregar-carrito/{price_id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
        Route::get('/eliminar-carrito/{cart_id}', ['as' => 'cart.delete', 'uses' => 'CartController@delete']);
        Route::get('/checkout', ['as' => 'checkout.index', 'uses' => 'CheckoutController@index']);
        Route::post('/checkout/completar', ['as' => 'checkout.complete', 'uses' => 'CheckoutController@complete']);
        Route::get('/checkout/error', ['as' => 'checkout.error', 'uses' => 'CheckoutController@error']);
        Route::get('/mis-pedidos', ['as' => 'user.orders', 'uses' => 'UserController@orders']);
    });
});
