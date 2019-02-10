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

Route::get('/date', function(){
	return view('date');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('');
Route::get('/admin/user', 'UserController@index')->name('');
Route::get('/admin/user/add', 'UserController@add')->name('');
Route::post('/admin/user/view', 'UserController@view')->name('');
Route::get('/admin/user/show/{id}', 'UserController@show')->name('');
Route::get('/admin/user/edit/{id}', 'UserController@edit')->name('');
Route::put('/admin/user/update/{id}', 'UserController@update')->name('');
Route::get('/admin/user/softdelete/{id}', 'UserController@soft_delete')->name('');
Route::get('/admin/category', 'CategoryController@index')->name('');
Route::get('/admin/category/add', 'CategoryController@add')->name('');
Route::get('/admin/category/show/{id}', 'CategoryController@show')->name('');
Route::post('/admin/category/view', 'CategoryController@view')->name('');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('');
Route::put('/admin/category/update/{id}', 'CategoryController@update')->name('');
Route::get('/admin/category/softdelete/{id}', 'CategoryController@soft_delete')->name('');
Route::get('/admin/item', 'ItemController@index')->name('');
Route::get('/admin/item/add', 'ItemController@add')->name('');
Route::get('/admin/item/show/{id}', 'ItemPdfController@show')->name('');
Route::get('/admin/item/pdf/{id}', 'ItemPdfController@pdf')->name('');
Route::post('/admin/item/view', 'ItemController@view')->name('');
Route::get('/admin/item/edit/{id}', 'ItemController@edit')->name('');
Route::put('/admin/item/update/{id}', 'ItemController@update')->name('');
Route::get('/admin/item/softdelete/{id}', 'ItemController@soft_delete')->name('');
Route::get('/admin/order', 'OrderController@index')->name('');
Route::get('/admin/order/add', 'OrderController@add')->name('');
Route::post('/admin/order/view', 'OrderController@view')->name('');
Route::get('/admin/order/show/{id}', 'OrderPdfController@show')->name('');
Route::get('/admin/order/pdf/{id}', 'OrderPdfController@pdf')->name('');
Route::get('/admin/order/edit/{id}', 'OrderController@edit')->name('');
Route::put('/admin/order/update/{id}', 'OrderController@update')->name('');
Route::get('/admin/order/softdelete/{id}', 'OrderController@softdelete')->name('');
Route::get('/admin/order/paid', 'PaidController@index')->name('');
Route::get('/admin/order/unpaid', 'UnpaidController@index')->name('');
Route::get('/admin/supplier', 'SupplierController@index')->name('');
Route::get('/admin/supplier/add', 'SupplierController@add')->name('');
Route::post('/admin/supplier/view', 'SupplierController@view')->name('');
Route::get('/admin/supplier/edit/{id}', 'SupplierController@edit')->name('');
Route::put('/admin/supplier/update/{id}', 'SupplierController@update')->name('');
Route::get('/admin/supplier/softdelete/{id}', 'SupplierController@softdelete')->name('');
Route::get('/admin/supplier/show/{id}', 'SupplierPdfcontroller@show')->name('');
Route::get('/admin/supplier/pdf/{id}', 'SupplierPdfcontroller@pdf')->name('');
Route::get('/admin/recycle', 'RecycleController@index')->name('');
Route::get('/admin/recycle/user/delete/{id}', 'RecycleController@user_delete')->name('');
Route::get('/admin/recycle/user/restore/{id}', 'RecycleController@user_restore')->name('');
Route::get('/admin/recycle/category/delete/{id}', 'RecycleController@category_delete')->name('');
Route::get('/admin/recycle/category/restore/{id}', 'RecycleController@category_restore')->name('');
Route::get('/admin/recycle/item/delete/{id}', 'RecycleController@item_delete')->name('');
Route::get('/admin/recycle/item/restore/{id}', 'RecycleController@item_restore')->name('');
Route::get('/admin/recycle/order/delete/{id}', 'RecycleController@order_delete')->name('');
Route::get('/admin/recycle/order/restore/{id}', 'RecycleController@order_restore')->name('');
Route::get('/admin/recycle/supplier/delete/{id}', 'RecycleController@supplier_delete')->name('');
Route::get('/admin/recycle/supplier/restore/{id}', 'RecycleController@supplier_restore')->name('');



// Laravel Socialite
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');