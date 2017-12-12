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
    return view('home');
});

// RUTAS PRODUCTOS
Route::get('lista_productos/{tipo}','ProductosController@lista_productos');
Route::get('producto/{id}','ProductosController@producto');
Route::post('comprar','ProductosController@comprar');