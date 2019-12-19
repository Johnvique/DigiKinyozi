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

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard/index', 'DashboardController@index');
    Route::get('/dashboard/service','ServiceController@index');
    Route::get('/dashboard/menu','MenuController@index');
    Route::get('/dashboard/booking','BookingController@index');
    Route::get('/dashboard/artist','ArtistController@index');
    Route::get('/dashboard/client','ClientController@index');
});
  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('service', 'ServiceController');
Route::resource('client', 'ClientController');
Route::resource('menu', 'MenuController');
Route::resource('artist', 'ArtistController');
Route::resource('booking', 'BookingController');
