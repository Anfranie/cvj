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

Route::get('addevent', 'AddEventController@create');
Route::post('addevent', 'AddEventController@store');

Route::get('events', 'EventController@index');

Route::get('/file','FileController@index')->name('viewfile');
Route::get('/file/upload','FileController@create')->name('formfile');
Route::post('/file/upload','FileController@store')->name('uploadfile');
Route::delete('/file/{id}','FileController@destroy')->name('deletefile');
Route::get('/file/download/{id}','FileController@show')->name('downloadfile');

//Admin Routes
Route::get('/admin', 'AdminController@index');
Route::get('/admin/ViewEvents', 'AdmminController@viewEvents');
Route::get('/admin/AddEvent', 'AdminController@addEvent');
Route::get('/admin/ViewClients', 'AdminController@viewClients');
Route::get('/admin/AddClient', 'AdminController@index');
Route::get('/admin/Calendar', 'AdminController@index');

//AE Routes
Route::get('/ae', 'AEController@index');
Route::get('/ae/ViewEvents', 'AEController@viewEvents');
Route::get('/ae/AddEvent', 'AEController@addEvent');
Route::get('/ae/ViewClients', 'AEController@viewClients');
Route::get('/ae/AddClient', 'AEController@index');
//Stockman Routes
Route::get('/stockman', 'StockmanController@index');

//Finance Unit Routes
Route::get('/finance', 'FinanceController@index');

//Head Accountant Routes
Route::get('/accountant', 'AccountantController@index');

//Banquet Supervisor Routes
Route::get('/bs', 'BSController@index');

//Commissary Unit Routes
Route::get('/commissary', 'CommissaryController@index');

//Florist Routes
Route::get('/florist', 'FloristController@index');

