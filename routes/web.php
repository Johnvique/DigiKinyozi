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
    Route::get('/dashboard/service', function () {
        return view('dashboard/service');
    });
    Route::get('/dashboard/artist', function () {
        return view('dashboard/artist');
    });
    Route::get('/dashboard/booking', function () {
        return view('dashboard/booking');
    });
    Route::get('/dashboard/client', function () {
        return view('dashboard/client');
    });
    Route::get('/dashboard/menu', function () {
        return view('dashboard/menu');
    });   
});
  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('service', 'ServiceController');
Route::resource('client', 'ClientController');
Route::resource('menu', 'MenuController');
Route::resource('artist', 'ArtistController');
Route::resource('booking', 'BookingController');
