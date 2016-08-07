<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('customer');
});

Route::controller('datatables', 'CustomerController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'customer',
]);

// Customer
Route::get('/customer', 'CustomerController@index');
Route::get('/customer/tambah', 'CustomerController@create');
Route::post('/customer/tambah', 'CustomerController@store');
Route::get('/customer/edit/{id_customer}', 'CustomerController@edit');
Route::patch('/customer/edit/{id_customer}', 'CustomerController@update');
Route::get('/customer/lihat/{id_customer}', 'CustomerController@detail');
Route::delete('/customer/hapus/{id_customer}', 'CustomerController@destroy');

// Diskon
Route::get('/diskon', 'DiskonController@index');

// Olah Data
Route::get('/data', 'DataController@index');