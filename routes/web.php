<?php

use Illuminate\Support\Facades\Route;

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
//Homepage
Route::get('/', function () {
    return view('index');
});
Route::get('/apanel', function () {
    return view('layouts.apanel');
});

//Local SMS Route
Route::resource('sms','SmsController');

//Tenant Sms Route
Route::resource('tsms','TsmsController');

//Notice Route
Route::resource('notice', 'NoticeController');

//Auth Route
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route Group For Admin
Route::group([ 'as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']],
function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
});

//Route group for Tenant
Route::group([ 'as'=>'tenant.', 'prefix'=>'tenant', 'namespace'=>'Tenant', 'middleware'=>['auth','tenant']],
function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
});

//User Route
Route::resource('/user', 'UserController');

//Payment Route
Route::resource('payment', 'PaymentController');
// Route::get('payment/create', 'PaymentController@create')->middleware('admin');

//Information Routes
Route::resource('personalinfo','PersonalinfoController');
Route::resource('emergcontact', 'EmergcontactController');
Route::resource('familymember', 'FamilymemberController');
Route::resource('maidinfo', 'MaidinfoController');
Route::resource('driverinfo', 'DriverinfoController');
Route::resource('landlordinfo', 'LandlordinfoController');