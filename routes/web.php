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
Route::resource('/participantes','ParticipanteController') ;
Route::get('participantes/{idparticipantes}/destroy',[
'uses'=>'ParticipanteController@destroy',
'as'=>'participantes.destroy']);

Route::resource('/item','ItemController') ;
Route::get('item/{iditem}/destroy',[
'uses'=>'ItemController@destroy',
'as'=>'item.destroy']);

Route::resource('/pdf','PDFController') ;
Route::resource('/tematica','TematicaController') ;

Route::resource('/lista','ListadechequeoController') ;
Route::get('lista/{idlista}/destroy',[
'uses'=>'ListadechequeoController@destroy',
'as'=>'lista.destroy']);
Route::resource('/listait','ListaItemController') ;
Route::resource('/estado','EstadoController') ;
Route::resource('/usuario','RegisterController');


Route::resource('/evenpart','EventoHasParticipantesController') ;
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/evento','HomeController');
Route::post('login','Auth\LoginController@login')->name('login');
Auth::routes();