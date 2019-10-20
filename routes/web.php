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

Route::get('/', 'HomeController@index')->name('home');;


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/machines', 'MachineController@index')->middleware('auth')->name('machine.index');
    Route::put('/machines/{machine}', 'MachineController@update')->name('machine.update');
    Route::post('/machines', 'MachineController@store')->middleware('auth')->name('machine.store');
});
