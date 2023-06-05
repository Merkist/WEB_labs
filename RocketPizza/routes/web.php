<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/pizza', 'App\Http\Controllers\SectionController@get_pizza');
Route::get('/pizza/{ing_id}', 'App\Http\Controllers\SectionController@get_pizza_f');

Route::get('/drink', 'App\Http\Controllers\SectionController@get_drink');
Route::get('/snack', 'App\Http\Controllers\SectionController@get_snack');
Route::get('/dessert', 'App\Http\Controllers\SectionController@get_dessert');


Route::get('/cart', 'App\Http\Controllers\SectionController@get_cart');
Route::post('/cart', 'App\Http\Controllers\SectionController@send_cart');

Route::get('/add-to-cart/{id}', 'App\Http\Controllers\SectionController@add_to_cart');

Route::get('/cart-item-plus/{id}', 'App\Http\Controllers\SectionController@cart_item_plus');
Route::get('/cart-item-minus/{id}', 'App\Http\Controllers\SectionController@cart_item_minus');
Route::get('/cart-item-delete/{id}', 'App\Http\Controllers\SectionController@cart_item_delete');


