<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => ['auth', 'has.permission']], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

		Route::get('/', function () {
			return view('dashboard');
		});

		Route::get('dashboard', function () {
			return view('dashboard');
		})->name('dashboard');

	Route::resource('roles','RoleController');
	
	Route::resource('leaves','LeaveController');
	Route::post('approve/{id}','LeaveController@acceptReject')->name('accept.reject');
	
	Route::resource('notices','NoticeController');
	
	//User Info Routes
	Route::resource('family','FamilyController');
	Route::resource('emergency','EmergencyController');
	Route::resource('extra','ExtrainfoController');
	Route::resource('info','UserinfoController');
	//Payment Route
	Route::resource('payment','PaymentController');
	
	//Payment Route
	Route::resource('notice','NoticeController');
});



//components