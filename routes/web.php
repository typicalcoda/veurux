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

/*————————————————————————————————————————————————————————*/
Route::get('/', 'DashboardController@index');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@create');

Route::get('/login', 'SessionController@index');
Route::post('/login', 'SessionController@create');

Route::get('/logout', 'SessionController@destroy');
/*————————————————————————————————————————————————————————*/


Route::get('/practices', 'PracticeController@index');
Route::post('/practices', 'PracticeController@create');

Route::get('/doctors', 'DoctorController@index');
Route::post('/doctors', 'DoctorController@create');

Route::get('/pickups', 'PickupController@index');
Route::post('/pickups', 'PickupController@create');











