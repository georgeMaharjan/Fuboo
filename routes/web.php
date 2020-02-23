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
Route::view('/','welcome')->name('welcome');

//futsals pages
Route::get('/futsals','FutsalController@index')->name('futsals');
Route::get('/futsal/{name}', 'FutsalController@show')->name('futsal.details');

//Auth routes
Auth::routes();

//home pages
Route::get('/home', 'HomeController@home')->name('home');

//admin routes
Route::group(['middleware' =>['auth','admin']],function ()
{
    Route::get('/admin','AdminController@index')->name('admin');

    //admin user routes
    Route::get('/admin/users', 'UsersController@index')->name('admin.users');
    Route::post('/admin/users/addOwner','UsersController@store')->name('addOwner');

    //admin futsal routes
    Route::get('/admin/futsals','AdminController@futsalindex')->name('admin.futsals');
    Route::post('/admin/timeslots/store', 'AdminController@storeTimeSlot')->name('timeslots.store');

//    timeslots
//    Route::get('/admin/timeslots', )->name('admin.timeslots');

});

//owner routes
Route::group(['middleware' => ['auth','owner']], function ()
{
    Route::get('/owner/{id}','OwnerController@show')->name('owner');
    Route::get('owner/booking/{id}', 'OwnerController@bookingPage')->name('bookings');
    Route::get('owner/stats/{id}', 'OwnerController@stats')->name('stats');
    Route::view('/owner/profile/{id}', 'owner.oprofile')->name('owner.profile');
    Route::put('/owner/futsal/update/{id}','OwnerController@futsalupdate')->name('futsal.update');
});

//player middleware

Route::group(['middleware' => ['auth', 'player']],function ()
{
   Route::view('/profile','player.profile')->name('player.profile');
});