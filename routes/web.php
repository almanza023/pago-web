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

Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');
Route::resource('clientes', 'ClienteController');
Route::resource('rutas', 'RutaController');
Route::resource('forma_pagos', 'FormaPagoController');
Route::resource('usuarios', 'UsuarioController');
Route::resource('prestamos', 'PrestamoController');
Route::resource('pagos', 'PagoController');
Route::resource('gastos', 'GastoController');
Route::resource('liquidacion-dias', 'LiquidacionDiaController');

//ACTUALIZAR

Route::put('liquidacion-dias/base', 'LiquidacionDiaController@updateBase')->name('liquidacion-dia.updateBase');

//get






//estados
Route::get('clientes/estado/{id}', 'ClienteController@change')->name('clientes.status');
Route::get('rutas/estado/{id}', 'RutaController@change')->name('rutas.status');
Route::get('forma_pago/estado/{id}', 'FormaPagoController@change')->name('forma_pago.status');
Route::get('usuarios/estado/{id}', 'UsuarioController@change')->name('usuarios.status');
Route::get('gastos/estado/{id}', 'GastoController@change')->name('gastos.status');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
