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

Route::resources([
    'cars' => 'CarController',
    'locations' => 'LocationController',
    'bookings' => 'CarBookController'
]);
Route::get('/get-destination-locations', 'CarBookController@get_destination_location')->name('get_destination_location');
Route::get('/check-car-available', 'CarBookController@check_car_available')->name('check-car-available');
