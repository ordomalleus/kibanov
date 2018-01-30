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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', 'Shop\GeneralController@index')->name('general.index');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
