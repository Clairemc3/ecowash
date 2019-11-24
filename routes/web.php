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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/backend-css', 'HomeController@cssPractice')->name('becss');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Editing machines
    Route::get('/machines', 'MachineController@index')->name('machine.index');
    Route::get('/machines/create', 'MachineController@create')->name('machine.create');
    Route::post('/machines', 'MachineController@store')->name('machine.store');
    Route::get('/machines/{machine}', 'MachineController@edit')->name('machine.edit');
    Route::put('/machines/{machine}', 'MachineController@update')->name('machine.update');
    Route::delete('/machines/{machine}', 'MachineController@destroy')->name('machine.destroy');


    // Editing content
    Route::get('/content', 'ContentController@index')->name('content.index');
    Route::get('/content/create', 'ContentController@create')->name('content.create');
    // Route::post('/machines', 'MachineController@store')->name('machine.store');
    // Route::get('/machines/{machine}', 'MachineController@edit')->name('machine.edit');
    // Route::put('/machines/{machine}', 'MachineController@update')->name('machine.update');
    // Route::delete('/machines/{machine}', 'MachineController@destroy')->name('machine.destroy');

});
