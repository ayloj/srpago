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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/examen', 'ExamenController@home');

Route::get('/getmunicipio', 'ExamenController@getmunicipio');

Route::get('/map', function (){
  return view('examen.map');
});
