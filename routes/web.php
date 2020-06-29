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



//Route::get('/', function () { return view('auth/login'); })->name('login');
Route::get('/', function () { return view('auth/login'); })->name('login');


Route::get('/Empleados/Home', 'HomeController@indexEmpleados')->name('HomeEmpleados')->middleware('auth');


// Rutas Reestringidas al Empleado
Route::get('/Stock','CarController@index')->name('Stock')->middleware('auth');;
Route::get('/getModels/{brandName}','CarController@getModels')->name('getModels');
Route::get('/getCarsInfo','CarController@getCarsInfo')->name('getCarsInfo');


Auth::routes();

Route::middleware(['auth', 'Administrador'])->group(function () {
Route::get('/administrador', 'HomeController@indexAdministrador')->name('administrador');

// Seccion Autos.
Route::get('/InsertarAuto', 'CarController@showCarForm')->name('AgregarAuto');
Route::get('/Administrador/Autos', 'CarController@showCarsSection')->name('Autos');
Route::get('/Administrador/Autos/Eliminar/','CarController@indexDelete')->name('EliminarAuto');
Route::get('/getCarsInfoDelete','CarController@getCarsInfoEliminar')->name('getCarsInfoDelete');
Route::post('/Administrador/Autos/Eliminar/','CarController@destroy')->name('Autos.Eliminar.Destroy');
Route::post('/InsertarAuto/save','CarController@store')->name('saveCar');
Route::post('/Administrador/Autos/Editar/','CarController@update')->name('editCar');

// Rutas Ventas.
Route::get('/Administrador/Ventas', 'SaleController@showVentas')->name('Ventas');
Route::get('/Administrador/Ventas/Listar','SaleController@show')->name('ListarVentas');
Route::get('/Administrador/Ventas/Agregar','SaleController@showFilter')->name('AgregarVenta');
Route::get('/Administrador/Ventas/Agregar/brands','SaleController@getBrands')->name('getBrands');
Route::get('/Administrador/Ventas/Agregar/ListarAutosVender','SaleController@create')->name('AgregarVentaListaAutos');
Route::post('/Administrador/Ventas/GuardarVenta/','SaleController@store')->name('storeSale');
Route::post('/Administrador/Ventas/Eliminar/','SaleController@destroy')->name('deleteSale');
Route::post('/Administrador/Ventas/Editar/','SaleController@update')->name('editSale');

// Rutas Empleados.
Route::get('/Administrador/Empleados', 'UserController@showEmployee')->name('Empleados');
Route::get('/Administrador/Empleados/Eliminar','UserController@show')->name('EliminarEmpleados');
Route::post('/Administrador/Empleados/Eliminar/User','UserController@destroy')->name('deleteUser');
Route::post('/Administrador/Empleados/Editar/','UserController@update')->name('editUser');
});