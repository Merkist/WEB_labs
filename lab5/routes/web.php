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

Route::get('/section/{name}', 'App\Http\Controllers\SectionController@get_section');

Route::get('/cart', 'App\Http\Controllers\SectionController@get_cart');

Route::post('/cart', 'App\Http\Controllers\SectionController@send_cart');
