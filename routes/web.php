<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/ongkir', function () {
//     return view('ongkir');
// });


Route::get('/', 'App\Http\Controllers\CheckOngkirController@index');
Route::post('/ongkir', 'App\Http\Controllers\CheckOngkirController@check_ongkir');
Route::get('/cities/{province_id}', 'App\Http\Controllers\CheckOngkirController@getCities');
