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
Route::view('/','welcome')->middleware('verified');


//Auth routes
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');

//admin routes
Route::group(['middleware' =>['auth','admin']],function ()
{
    Route::view('/admin','admin.adminpanel')->name('admin');
    Route::view('/admin/users', 'admin.users')->name('users');
    Route::view('/admin/futsals','admin.futsals')->name('futsals');
});

//owner routes
Route::group(['middleware' => ['auth','owner']], function ()
{
    Route::view('/owner','owner.ownerpage');
});