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

// Guest routes
Route::namespace('Auth')->middleware(['guest'])->group(function () {
	Route::get('/activate/{token}/{email}', 'ActivationController@showActivationForm')
		->where('token', '[A-z0-9]{40}')
		->name('activation.showForm');
	Route::post('/activate/{token}/{email}', 'ActivationController@activate')
		->where('token', '[A-z0-9]{40}')
		->name('activation.activate');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

	// Dashboard
	Route::get('/', 'DashboardController@show')->name('dashboard');

    // Machines
    Route::prefix('machines')->name('machine.')->group(function() {
        Route::get('/', 'MachineController@index')->name('index');
        Route::get('/create', 'MachineController@create')->name('create');
        Route::post('/', 'MachineController@store')->name('store');
        Route::get('/{machine}', 'MachineController@edit')->name('edit');
        Route::put('/{machine}', 'MachineController@update')->name('update');
        Route::delete('/{machine}', 'MachineController@destroy')->name('destroy');
    });

    // Content
    Route::prefix('content')->name('content.')->group(function() {
        Route::get('/', 'ContentController@index')->name('index');
        Route::get('/create', 'ContentController@create')->name('create');
        Route::post('/', 'ContentController@store')->name('store');
        Route::get('/{content}', 'ContentController@edit')->name('edit');
        Route::put('/{content}', 'ContentController@update')->name('update');
        Route::delete('/{content}', 'ContentController@destroy')->name('destroy');
    });

    // Alerts
    Route::prefix('alerts')->name('alert.')->group(function() {
        Route::get('/', 'AlertController@index')->name('index');
        Route::get('/create', 'AlertController@create')->name('create');
        Route::post('/', 'AlertController@store')->name('store');
        Route::get('/{alert}', 'AlertController@edit')->name('edit');
        Route::put('/{alert}', 'AlertController@update')->name('update');
        Route::delete('/{alert}', 'AlertController@destroy')->name('destroy');
    });

    // Sliders
    Route::prefix('sliders')->name('slider.')->group(function() {
        Route::get('/', 'SliderController@index')->name('index');
        Route::get('/create', 'SliderController@create')->name('create');
        Route::post('/', 'SliderController@store')->name('store');
        Route::get('/{slider}', 'SliderController@edit')->name('edit');
        Route::put('/{slider}', 'SliderController@update')->name('update');
        Route::delete('/{slider}', 'SliderController@destroy')->name('destroy');
    });

    // Promotions
    Route::prefix('promotions')->name('promotion.')->group(function() {
        Route::get('/', 'PromotionController@index')->name('index');
        Route::get('/create', 'PromotionController@create')->name('create');
        Route::post('/', 'PromotionController@store')->name('store');
        Route::get('/{promotion}', 'PromotionController@edit')->name('edit');
        Route::put('/{promotion}', 'PromotionController@update')->name('update');
         Route::delete('/{promotion}', 'PromotionController@destroy')->name('destroy');
    });


	// Users
	Route::prefix('users')->name('user.')->group(function() {

		//Inviting a user
		Route::get('/invite', 'InvitationController@create')->name('invitation');
		Route::post('/invite', 'InvitationController@store')->name('invitation.store');
		Route::post('/resend-invite/{user}', 'InvitationController@resend')->name('invitation.resend');

		// Managing a user
		Route::get('/', 'UserController@index')->name('index');
		Route::get('/{user}', 'UserController@edit')->name('edit');
		Route::put('/{user}', 'UserController@update')->name('update');
		Route::delete('/{user}', 'UserController@destroy')->name('destroy');


	});


    // Images
    // Returns json
    Route::get('/images/{folder}', 'ImageController@index')->name('images.index');

});
