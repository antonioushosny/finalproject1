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
/*
Route::get('/', function () {
    return view('welcome');
});*/
/*
Auth::routes();
*/
Route::get('test','SellerController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get ( '/product', 'CartController@getIndex' )->name('product');

Route::get ( '/',['uses' => 'CartController@getIndex','as' => 'product'] );

Route::post ( '/login', 'MainController@login' )->name('login');
Route::post ( '/register', 'MainController@register' )->name('register');
Route::get ( '/logout', 'MainController@logout' )->name('logout');


Route::get('seller', function () {
    return view('seller.index');
});
Route::get ( '/seller/showproduct/{Categ_name}',[
    'uses' => 'ProductsController@index',
    'as' => 'showproduct'] );


//Route::get ( '/seller/showproduct/{Categ_name}', 'ProductsController@index')->name('showproduct');
//Route::get ('addproducts','ProductsController@store')->name('addproducts');


Route::post ('/seller/showproduct/products',['uses'=>'ProductsController@store','as'=>'products']);
Route::delete ('/products/{id}','ProductsController@destroy');





/////////////////test//////////////////////////
Route::get('ajaxImageUpload', ['uses'=>'AjaxImageUploadController@ajaxImageUpload']);
Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'AjaxImageUploadController@ajaxImageUploadPost']);


Route::get('images-upload', 'HomeController@imagesUpload');

Route::post('images-upload', 'HomeController@imagesUploadPost')->name('images.upload');