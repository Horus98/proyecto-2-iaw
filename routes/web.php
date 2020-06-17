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

Route::get('/administrador', function () {
    return view('administrador');
})->name('administrador');

Route::get('/Stock','CarController@index', function () {
    return view('Stock');
})->name('Stock');


Route::get('/getModels/{brandName}','CarController@getModels')->name('getModels');

Route::get('/getCarsInfo','CarController@getCarsInfo')->name('getCarsInfo');

Route::get('/consulta', function () {
    return view('consultaBD');
})->name('consulta');

//Rutas admnistrador.

Route::get('/administrador', function () {
    return view('administrador');
})->name('administrador');


Route::get('/ListarTodosLosAutos','CarController@listAllCars', function () {
    return view('listarTodosAutos');
})->name('listarAutos');

Route::get('/InsertarAuto', function () {
    return view('AgregarAuto');
})->name('AgregarAuto');

Route::post('/InsertarAuto/save','CarController@store')->name('saveCar');


Route::get('/Administrador/Autos', function () {
    return view('Autos');
})->name('Autos');

Route::get('/Administrador/Empleados', function () {
    return view('Empleados');
})->name('Empleados');


Route::get('/Administrador/Autos/Eliminar/','CarController@indexDelete',function(){
    return view('eliminar');
})->name('EliminarAuto');

Route::get('/getCarsInfoDelete','CarController@getCarsInfoEliminar')->name('getCarsInfoDelete');

Route::post('/Administrador/Autos/Eliminar/{id}','CarController@destroy')->name('Autos.Eliminar.Destroy');

// Administrador Ventas.

Route::get('/Administrador/Ventas', function () {
    return view('Ventas');
})->name('Ventas');

Route::get('/Administrador/Ventas/Listar','SaleController@show',function(){
    return view('ListarVentas');
})->name('ListarVentas');

Route::get('/Administrador/Ventas/Agregar',function(){
    return view('AgregarVenta');
})->name('AgregarVenta');

Route::get('/Administrador/Ventas/Agregar/brands','SaleController@getBrands')->name('getBrands');

Route::get('/Administrador/Ventas/Agregar/ListarAutosVender','SaleController@create',function(){
    return view('AgregarVentaListaAutos');
})->name('AgregarVentaListaAutos');

Route::post('/Administrador/Ventas/GuardarVenta/{c}','SaleController@store')->name('storeSale');