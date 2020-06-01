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

//try
Route::view('/try','try');


//  welcome page
Route::view('/','welcome')->name('welcome');

Route::get('/searchresult','FutsalController@search')->name('search.result');

//futsals pages
Route::get('/futsals','FutsalController@index')->name('futsals');
Route::get('/futsals/get-lists', [
    'as' => 'futsals.getLists',
    'uses' => 'FutsalController@getLists'
]);
Route::get('/futsal/{name}', 'FutsalController@show')->name('futsal.details');

//Booking Routes

Route::post('/futsal/booking', 'BookingController@store')->name('futsal.booking')->middleware('auth');


//Auth routes
Auth::routes();

//home pages
Route::get('/home', 'HomeController@home')->name('home');

//admin routes
Route::group(['middleware' =>['auth','admin']],function ()
{
    Route::get('/admin/','AdminController@index')->name('admin');

    //admin user routes
    Route::get('/admin/users', 'UsersController@index')->name('admin.users');
    Route::post('/admin/users/addOwner','UsersController@store')->name('addOwner');

    //admin futsal routes
    Route::get('/admin/futsals','AdminController@futsalindex')->name('admin.futsals');
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
    Route::post('/owner/addTimeSlot', 'OwnerController@addTimeSlot')->name('addTimeSlot');
    Route::post('/owner/TimeSlot/delete/{id}', 'OwnerController@deleteTimeslot')->name('Timeslot.delete');
    Route::put('/owner/TimeSlot/update/{id}', 'OwnerController@updateTimeslot')->name('Timeslot.update');
});

//player middleware
Route::group(['middleware' => ['auth', 'player']],function ()
{
   Route::get('/profile/{id}','UsersController@show')->name('player.profile');
   Route::put('/profile/update/{id}','UsersController@update')->name('player.update');
});