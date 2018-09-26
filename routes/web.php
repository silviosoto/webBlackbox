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

Route::get('/','LoginController@index');
Route::resource('login','LoginController');
Route::get('CerrarSesion','LoginController@CerrarSesion');
Route::resource('dashboard','dashboard');
Route::resource('bitacora','bitacoracontroller');
Route::resource('Usuarios','UsuarioController');
Route::post('UsuariosInsert','UsuarioController@store');
Route::post('UsuarioEliminar','UsuarioController@eliminar');
Route::get('ListarUsuario','UsuarioController@ListarUsuario');
Route::post('UsuarioBuscar','UsuarioController@Buscar');
Route::post('UsuarioEditar','UsuarioController@Editar');
Route::get('UsuarioConsultor/{id}','UsuarioController@Consultor');
Route::get('UsuarioBitacora/{id}','UsuarioController@Bitacora');
Route::resource('Motocicleta','MotoController');
Route::post('BuscarMotocicleta','MotoController@Buscar');

Route::resource('Dispositivo','DispositivoController');
Route::get('Bitacoraconsultor/{id}/{idisp}','BitacoraConsultorController@ConsultaPorFecha');
Route::post('GraficaAno','BitacoraConsultorController@GraficaAno');
Route::post('ConsultarAno','bitacoracontroller@ConsultarAno');
Route::post('ConsultarMeses','bitacoracontroller@ConsultarMeses');
Route::get('ConsultarDias/{idDisp}/{fecha}/{mes}','bitacoracontroller@ConsultarDias');
Route::post('ConsultarDia','bitacoracontroller@ConsultarDia');
Route::get('ConsultarHoras/{idDisp}/{fecha}/{mes}/{dia}','bitacoracontroller@ConsultarHoras');
