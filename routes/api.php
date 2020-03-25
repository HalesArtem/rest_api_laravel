<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('/freelancer')->group(function () {

    // роут получает всех фрилансеров
    Route::get
    ('/', ['uses' => 'FreelanceController@getFreelances']);
    // в будущем получает имя фрилансера
    Route::get
    ('/{freelance_name}', ['uses' => 'FreelanceController@detail']);
    // создание фрилансера
    Route::post
    ('/', ['uses' => 'FreelanceController@create']);
    // удаление фрилансера
    Route::delete
    ('/{freelancer_id}', ['uses' => 'FreelanceController@delete'])->where(['freelancer_id' => '[0-9+]']);
    // обновить запись
    Route::put('/{freelancer_id}', ['uses' => 'FreelanceController@update'])->where(['freelancer_id' => '[0-9+]']);
});

Route::prefix('/customers')->group(function () {

    Route::get
    ('/', ['uses' => 'CustomerController@get']);
    Route::get
    ('/{customer_name}', ['uses' => 'CustomerController@detail']);
    Route::post
    ('/', ['uses' => 'CustomerController@create']);
    Route::delete
    ('/{customer_id}', ['uses' => 'CustomerController@delete'])->where(['customer_id' => '[0-9+]']);
    Route::put('/{customer_id}', ['uses' => 'CustomerController@update'])->where(['customer_id' => '[0-9+]']);
});

Route::prefix('/orders')->group(function () {

    Route::get
    ('/', ['uses' => 'OrderController@get']);
    Route::get
    ('/{order_name}', ['uses' => 'OrderController@detail']);
    Route::post
    ('/', ['uses' => 'OrderController@create']);
    Route::delete
    ('/{order_id}', ['uses' => 'OrderController@delete'])->where(['order_id' => '[0-9+]']);
    Route::put('/{order_id}', ['uses' => 'OrderController@update'])->where(['order_id' => '[0-9+]']);
});

Route::prefix('/applications')->group(function () {

    Route::get
    ('/', ['uses' => 'ApplicationController@get']);
    Route::get
    ('/{application_name}', ['uses' => 'ApplicationController@detail']);
    Route::post
    ('/', ['uses' => 'ApplicationController@create']);
    Route::delete
    ('/{application_id}', ['uses' => 'ApplicationController@delete'])->where(['application_id' => '[0-9+]']);
    Route::put('/{application_id}', ['uses' => 'ApplicationController@update'])->where(['application_id' => '[0-9+]']);
});
