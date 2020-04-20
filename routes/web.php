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
    Route::post('/content', 'ContentController@store')->name('content.store');
    Route::get('/content/{content}', 'ContentController@edit')->name('content.edit');
    Route::put('/content/{content}', 'ContentController@update')->name('content.update');
    Route::delete('/content/{content}', 'ContentController@destroy')->name('content.destroy');

    // Alerts
    Route::get('/alerts', 'AlertController@index')->name('alert.index');
    Route::get('/alerts/create', 'AlertController@create')->name('alert.create');
    Route::post('/alerts', 'AlertController@store')->name('alert.store');
    Route::get('/alerts/{alert}', 'AlertController@edit')->name('alert.edit');
    Route::put('/alerts/{alert}', 'AlertController@update')->name('alert.update');
    Route::delete('/alerts/{alert}', 'AlertController@destroy')->name('alert.destroy');

    // Sliders
    Route::get('/sliders', 'SliderController@index')->name('slider.index');
    Route::get('/sliders/create', 'SliderController@create')->name('slider.create');
    Route::post('/sliders', 'SliderController@store')->name('slider.store');
    Route::get('/sliders/{slider}', 'SliderController@edit')->name('slider.edit');
    Route::put('/sliders/{slider}', 'SliderController@update')->name('slider.update');
    Route::delete('/sliders/{slider}', 'SliderController@destroy')->name('slider.destroy');
});
