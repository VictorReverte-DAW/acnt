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
    return view('/welcome');
});
Route::get('/welcome', function () {
    return view('/welcome');
});
Route::get('/acta', function () {
    return view('miembros.actaReuniones');
});
Route::get('/contabilidad', function () {
    return view('miembros.contabilidad');
});
Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
/*Usuarios*/
Route::get('/listaUsuarios', 'UserController@index')->name('listaUsuarios');
Route::get('/borrarUsuario/{id}', 'UserController@destroy')->name('borrarUsuario');
//Reuniones
Route::get('/reuniones', 'reunionesController@index')->name('reuniones');
Route::get('/AsistirReunion/{id}', 'reunionesController@asistirReunion')->name('AsistirReunion');
Route::get('/CrearReuniones', 'reunionesController@store')->name('CrearReuniones');
Route::get('BorrarReuniones/{id}', 'reunionesController@destroy')->name('BorrarReuniones');
Route::get('terminarReunion/{id}','reunionesController@finalizar')->name('finalizar');
Route::post('/actualizarReunion/{id}','reunionesController@update')->name('actualizarReunion');


/*Juegos*/
Route::get('/Juegos', 'JuegoController@index')->name('Juegos');
Route::get('/borrarJuego/{id}', 'JuegoController@destroy')->name('borrarJuego');
Route::post('añadirJuego', 'JuegoController@store')->name('añadirJuego');
Route::POST('/actualizarJuego/{id}','JuegoController@update')->name('actualizarJuego');

/*Torneos */
Route::get('/Torneos', 'TorneoController@index')->name('Torneos');
Route::post('/crearTorneo', 'TorneoController@store')->name('crearTorneo');
Route::get('/inscribirse/{id}', 'TorneoController@inscribirse')->name('inscribirse');
Route::get('/describirse/{id}', 'TorneoController@describirse')->name('describirse');
Route::get('/borrarTorneo/{id}', 'TorneoController@destroy')->name('borrarTorneo');
Route::post('/actualizarTorneo/{id}', 'TorneoController@update')->name('actualizarTorneo');
Route::get('terminarTorneo/{id}','TorneoController@finalizar')->name('terminarTorneo');
Route::post('añadirComentario','ParticipantesController@store')->name('añadirComentario');

/*Cuotas*/
Route::post('crearCuota/', 'CuotaController@store')->name('crearCuota');

/*Emails*/
Route::resource('mail','MailController'); 

Route::put("/actualizar/{id}","ajaxCrudController@update");

