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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/Ruta1', function () {
    return view('ruta1');
})->name('ruta1');

Route::get('/Stock','CarController@index', function () {
    return view('Stock');
})->name('Stock');

Route::get('/getModels/{brandName}','CarController@getModels')->name('getModels');