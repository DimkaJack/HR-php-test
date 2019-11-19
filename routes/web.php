<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/weather');
});

Route::get('/weather', 'WeatherController@weather')->name('weather');
Route::get('/orders', 'OrderController@orders')->name('orders');
