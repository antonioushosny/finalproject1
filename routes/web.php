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

Route::get('test/{id}', function ($id) {
    return view('test',compact('id'));
})->name('test');
/*
Auth::routes();
*/

Route::get ( '/',['uses' => 'HomeController@index','as' => 'product'] );

Route::post ( '/login', 'MainController@login' )->name('login');
Route::post ( '/register', 'MainController@register' )->name('register');
Route::get ( '/logout', 'MainController@logout' )->name('logout');


Route::get('/show/{categ_name}/{group_name}',['as'=>'show','uses'=>'ProductController@index']);

Route::group(['middleware'=>'auth','prefix'=>'user'],function()
{
    Route::get('confirmbuy',['uses'=>"CartController@postcheckout",'as'=>'confirmbuy']);

});


Route::group(['middleware' => ['seller'],'prefix'=>'seller'], function () {
    Route::get('/', 'SellerController@index')->name('seller');
    Route::get ('/showproduct/{categ_name}/{group_name}',['uses' => 'ProductsController@index','as' => 'showproduct']);
    Route::post ('/addproduct',['uses' => 'ProductsController@store','as' => 'storeproduct']);
    Route::get ('/addproduct/{categ_name}/{group_name}',['uses' => 'ProductsController@create','as' => 'addproduct']);
    Route::post ('/showproduct/products',['uses'=>'ProductsController@store','as'=>'products']);
    Route::get ('/editproduct/{id}/{categ_name}/{group_name}',['uses'=>'ProductsController@edit','as'=>'editproduct']);
    Route::post ('/updateproduct/{id}',['uses'=>'ProductsController@update','as'=>'updateproduct']);
});

//////////////////////  Cart

Route::get('addtocartt/{id}',['uses'=>"CartController@getaddtocart",'as'=>'addtocartt']);
Route::get('shoppingcart',['uses'=>"CartController@shoppingcart",'as'=>'shoppingcart']);
Route::get('remove/{id}',['uses'=>"CartController@getRemoveItem",'as'=>'remove']);
 Route::get('update/{id}',['uses'=>"CartController@getupdateItem",'as'=>'update']);
Route::get('checkout',['uses'=>"CartController@getcheckout",'as'=>'checkout']);


///////////////////////admin
Route::get('showadmin',['uses'=>"AdminController@getIndex",'as'=>'showadmin']);

Route::get('deleteuser/{id}',['uses'=>"AdminController@deleteuser",'as'=>'deleteuser']);

Route::get('showseller',['uses'=>"AdminController@getsellers",'as'=>'showseller']);

Route::get('deleteseller/{id}',['uses'=>"AdminController@deleteseller",'as'=>'deleteseller']);

Route::get('adminproducts',['uses'=>"AdminController@getproducts",'as'=>'adminproducts']);

Route::get('deleteadminprodect/{id}',['uses'=>"AdminController@deleteproduct",'as'=>'deleteadminprodect']);

Route::get('adminstting',['uses'=>"AdminController@adminsetting",'as'=>'adminstting']);









/////////////////test//////////////////////////
Route::get('ajaxImageUpload', ['uses'=>'AjaxImageUploadController@ajaxImageUpload']);
Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'AjaxImageUploadController@ajaxImageUploadPost']);

Route::get('images-upload', 'HomeController@imagesUpload');

Route::post('images-upload', 'HomeController@imagesUploadPost')->name('images.upload');

    
