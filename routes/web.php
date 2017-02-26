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

//--------------------------------------------------//
#### REMEMBER - Dynamic wildcards at the bottom! #####
//--------------------------------------------------//


Route::get('/practices', 'PracticeController@index');
Route::post('/practices', 'PracticeController@create');
Route::get('/practices/delete/{practice}', 'PracticeController@destroy');
Route::delete('/practices', 'PracticeController@destroyMany');

Route::get('/doctors', 'DoctorController@index');
Route::post('/doctors', 'DoctorController@create');
Route::get('/doctors/delete/{doctor}', 'DoctorController@destroy');
Route::delete('/doctors', 'DoctorController@destroyMany');


Route::get('/pickups', 'PickupController@index');
Route::post('/pickups', 'PickupController@create');
Route::get('/pickups/delete/{pickup}', 'PickupController@destroy');
Route::delete('/pickups', 'PickupController@destroyMany');











