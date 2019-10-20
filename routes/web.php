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

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index');


Route::get('/machines', 'MachineController@index')->middleware('auth');
Route::put('/machines/{machine}', 'MachineController@update');

Route::post('/machines', 'MachineController@store')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
