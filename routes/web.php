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
Route::get('/catalog/{id?}', 'Shop\CatalogController@index')->name('catalog.catalog');
Route::get('/about', 'Shop\GeneralController@about')->name('general.about');
Route::get('/shops', 'Shop\GeneralController@shops')->name('general.shops');
// Работа с корзиной
Route::group(['prefix' => 'cart', 'middleware' => []], function (){
    Route::post('add', 'Shop\CartController@addCart');
    Route::post('plus', 'Shop\CartController@productCartPlus');
    Route::post('minus', 'Shop\CartController@productCartMinus');
    Route::post('delete', 'Shop\CartController@productCartDelete');
});
// Работа с заказами
Route::group(['prefix' => 'orders', 'middleware' => []], function (){
    Route::post('add', 'Shop\OrdersController@addOrder');
    Route::get('showUserStatus', 'Shop\OrdersController@showUserStatusOrder');
//    Route::get('/sendMail/{id}', 'Shop\OrdersController@sendMailOrder');
//    Route::get('/showMail/{id}', 'Shop\OrdersController@showMailOrder');
});
//=========================================================================================


// Админ панель
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    Route::get('/files/rebuild', 'Admin\AdminController@rebuildProductAttributes');

    // Работа по экспорту файлов
    Route::get('/files', 'Admin\AdminController@files')->name('admin.files');
    Route::get('/exports/clothes', 'Admin\AdminController@exportClothesView')->name('admin.exports.clothes');
    // получаем экспорт одежды
    Route::post('/exports/clothes/begin', 'Admin\AdminController@exportClothesBegin')->name('admin.exports.clothes.begin');
    // получаем уникальные значения размера одежды
    Route::get('/exports/clothes/size', 'Admin\AdminController@getAllClothesAttributesSize')->name('admin.exports.clothes.size');
    // получаем уникальные значения цвета одежды
    Route::get('/exports/clothes/color', 'Admin\AdminController@getAllClothesAttributesColor')->name('admin.exports.clothes.color');
    // получаем экспорт обуви
    Route::get('/exports/shoes/begin', 'Admin\AdminController@exportShoesBegin')->name('admin.exports.shoes.begin');
    // получаем уникальные значения размера обуви
    Route::get('/exports/shoes/size', 'Admin\AdminController@getAllShoesAttributesSize')->name('admin.exports.shoes.size');
    // получаем уникальные значения цвета обуви
    Route::get('/exports/shoes/color', 'Admin\AdminController@getAllShoesAttributesColor')->name('admin.exports.shoes.color');
    // получаем уникальные значения полноты обуви
    Route::get('/exports/shoes/volume', 'Admin\AdminController@getAllShoesAttributesVolume')->name('admin.exports.shoes.volume');
    // получаем уникальные значения жескости обуви
    Route::get('/exports/shoes/hardness', 'Admin\AdminController@getAllShoesAttributesHardness')->name('admin.exports.shoes.hardness');
    // TODO: временный для поиска всех товаров с брендом SOLO
    Route::get('/exports/show-solo', 'Admin\AdminController@getAllSoloBrand')->name('admin.exports.solo');



    Route::resource('product', 'Admin\ProductController');
    Route::post('product/add-attribute/{id}', 'Admin\ProductController@addAttribute');
    Route::delete('product/delete-attribute/{id}', 'Admin\ProductController@deleteAttribute');
    Route::delete('product/delete-image/{id}', 'Admin\ProductController@deleteImage');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('attributes-directories-value', 'Admin\AttributesDirectoriesValueController');
    Route::resource('product-group-attributes', 'Admin\ProductGroupAttributesController');
    Route::resource('product-group-attributes-value', 'Admin\ProductGroupAttributesValueController');
    Route::resource('orders', 'Admin\OrdersController');
//    Route::get('/createCategory', 'Admin\ProductController@createCategory')->name('admin.index');
});
//=========================================================================================


// TODO: Стандартные роутинги переделать
Route::get('/laravel', function () {
    return view('welcome');
});

//Auth::routes();
//// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
//// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
//// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('/home', 'HomeController@index')->name('home');
//=========================================================================================
