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

Route::get('/', 'WellcomeController@welcome');


Auth::routes(['verify' => true]);
Route::post('resetpassword','HomeController@resetpassword');
Route::get('/home', 'HomeController@index')->middleware('nachoauth');
Route::get('/verify/{usertoken?}', 'VerifyController@verify');
Route::post('congreso','CongresoController@create');
Route::fallback('HomeController@fallback');
Route::get('profile','HomeController@profile');
Route::post('editprofile','HomeController@editprofile');
Route::post('ponencia','HomeController@crearPonencia');
Route::post('userponencia','HomeController@userponencia');
Route::get('gettokencsrf','HomeController@gettokencsrf');

Route::post('altausers','HomeController@altausers');


// foto de perfil si no se sube.
// mensajes de un par de request