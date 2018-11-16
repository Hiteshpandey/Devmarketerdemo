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


Route::resource('/users', 'UserController');


Route::get('/logout', 'HomeController@logout');

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function(){
    Route::get('/','ManageController@index');
    Route::get('/dashboard',"ManageController@dashboard")->name('manage.dashboard');
<<<<<<< HEAD
=======
    Route::resource('/users','UserController');
>>>>>>> bb6f347a3d54edf61cab62cbff3239efb97dd4f1
});

Route::get('/home', 'HomeController@index')->name('home');
