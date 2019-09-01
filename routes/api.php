<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('costogasolina/estado/{estado}/municipio/{municipio}/precio/{precio}', 'CostogasolinaController@show');
Route::get('costogasolina/estado/{estado}/municipio/{municipio}', 'CostogasolinaController@show');
Route::get('costogasolina/estado/{estado}/precio/{precio}', 'CostogasolinaController@show');
Route::get('costogasolina/municipio/{municipio}/precio/{precio}', 'CostogasolinaController@show');
Route::get('costogasolina/estado/{estado}', 'CostogasolinaController@show');
Route::get('costogasolina/municipio/{municipio}', 'CostogasolinaController@show');
Route::get('costogasolina/precio/{precio}}', 'CostogasolinaController@show');




// /{post}/comments/{comment}
// /municipio/{municipio?}
