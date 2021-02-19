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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    /**
     * Starting Routes For Admin\HotelController
     */
    Route::get('hotels', 'Admin\HotelController@index')->name('admin.hotel.index');
    Route::get('hotel/create', 'Admin\HotelController@create')->name('admin.hotel.create');
    Route::post('hotel', 'Admin\HotelController@store')->name('admin.hotel.store');
    Route::get('hotel/{id}/edit', 'Admin\HotelController@edit')->name('admin.hotel.edit');
    Route::patch('hotel/{id}', 'Admin\HotelController@update')->name('admin.hotel.update');
    Route::get('hotel/destroy/{id}', 'Admin\HotelController@destroy')->name('admin.hotel.destroy');
    /**
     * Ending Routes For Admin\HotelController
     */
    Route::get('user/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('user.logout');
});
