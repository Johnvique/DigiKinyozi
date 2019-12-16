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
    Route::get('/dashboard/index', function () {
        return view('dashboard/index');
    });
Route::get('dashboard/services', 'ServicesController@index');
Route::get('dashboard/client', 'ClientController@index');
Route::get('dashboard/menu', 'MenuController@index');
Route::get('dashboard/artist', 'ArtistController@index');
Route::get('dashboard/booking', 'BookingController@index');      
});
  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('services', 'ServicesController');
Route::resource('client', 'ClientController');
Route::resource('menu', 'MenuController');
Route::resource('artist', 'ArtistController');
Route::resource('booking', 'BookingController');
