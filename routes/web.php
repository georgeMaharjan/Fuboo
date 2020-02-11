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

//  welcome page
Route::view('/','welcome');


//Auth routes
Auth::routes();


Route::get('/home', 'HomeController@home')->name('home');

//admin routes
Route::group(['middleware' =>['auth','admin']],function ()
{
    Route::get('/admin','AdminController@index')->name('admin');

    //admin user routes
    Route::get('/admin/users', 'UsersController@index')->name('admin.users');
    Route::post('/admin/users/addOwner','UsersController@store')->name('addOwner');

    //admin futsal routes
    Route::view('/admin/futsals','admin.futsals')->name('admin.futsals');
});

//owner routes
Route::group(['middleware' => ['auth','owner']], function ()
{
    Route::get('/owner','OwnerController@index')->name('owner');
    Route::get('owner/bookings', 'OwnerController@bookings')->name('bookings');
    Route::get('owner/stats', 'OwnerController@stats')->name('stats');
});