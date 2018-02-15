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

//Магазин
Route::get('/', 'Shop\GeneralController@index')->name('general.index');
//=========================================================================================4


// Админ панель
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    Route::resource('product', 'Admin\ProductController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('attributes-directories', 'Admin\AttributesDirectoriesController');
    Route::resource('attributes-directories-value', 'Admin\AttributesDirectoriesValueController');
    Route::resource('product-group-attributes', 'Admin\ProductGroupAttributesController');
    Route::resource('product-group-attributes-value', 'Admin\ProductGroupAttributesValueController');
//    Route::get('/createCategory', 'Admin\ProductController@createCategory')->name('admin.index');
});
//=========================================================================================


// TODO: Стандартные роутинги переделать
Route::get('/laravel', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//=========================================================================================
