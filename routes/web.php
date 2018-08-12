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

Route::get('login','LoginController@index')->name('login');

Route::post('checkLogin', 'LoginController@checkLogin');

Route::get('logout', 'LoginController@logout');

Route::resource('Admin', 'UsersController');

Route::resource('Purchases', 'PurchaseController');

Route::resource('RepairDevices', 'RepairDevicesController');

Route::resource('Salary', 'SalaryController');

Route::resource('Lab', 'LabController');