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
Route::group(['namespace' => 'Api', 'prefix' => $prefix], function() {
    Route::resource('categories', 'CategoryController');
    Route::resource('events', 'EventController');
    Route::resource('prices', 'PriceController');
    Route::resource('tickets', 'TicketController');
    Route::resource('users', 'UserController');
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
});
