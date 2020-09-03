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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function (){

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::resource('client','ClientController');
    Route::resource('product','ProductController');
    Route::resource('device','DeviceController');
    Route::resource('phone','PhoneController');
    Route::resource('simcard','SimcardController');
    Route::resource('contact','ContactController');

    Route::get('status/client', 'ClientController@status')->name('client.status');
    Route::get('poc/client', 'ClientController@poc')->name('client.poc');
    Route::get('deactivate/client', 'ClientController@deactivate')->name('client.deactivate');

    Route::get('status/device', 'DeviceController@status')->name('device.status');
    Route::get('lost/device', 'DeviceController@lost')->name('device.lost');
    
    Route::get('settings','SettingsController@index')->name('admin.settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

});