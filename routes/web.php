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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//////////// CLIENTES ////////////////////////////////////
Route::resource('clientes','ClienteController');
Route::post('/clientes/create', 'ClienteController@store');
Route::put('/{id}', 'ClienteController@update');

/////////////Usuarios/////////////////////////
	Route::resource('usuarios','UsuarioController');
	Route::post('/usuarios/create', 'UsuarioController@store');
	Route::put('/{id}', 'UsuarioController@update');

/////////////////////////////////promociones/////////////////////////
Route::resource('promociones','PromocionController');
Route::post('/promociones/create', 'PromocionController@store');
Route::put('/{id}', 'PromocionController@update');

/////////////////////////////////Alimentos/////////////////////////
Route::resource('alimento','AlimentoController');
Route::post('/alimento/create', 'AlimentoController@store');
Route::put('/{id}', 'AlimentoController@update');

/////////////////////////////////Ingresos/////////////////////////
Route::resource('ingresos','IngresosController');
Route::post('/ingresos/create', 'IngresosController@store');
Route::put('/{id}', 'IngresosController@update');