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
Route::get ( '/login',function(){
   return redirect ('/');
} );
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
    //Route::put ('/editproduct/{id}',['uses'=>'ProductsController@update','as'=>'editproduct']);
    Route::get('/orderDetails',['uses'=>'SellerController@orderDetails']);
    Route::post('/orderDetails',['uses'=>'SellerController@orderDetails','as'=>'orderDetails']);
   
    Route::get ('/editproduct/{id}/{categ_name}/{group_name}',['uses'=>'ProductsController@edit','as'=>'editproduct']);
    Route::post ('/updateproduct/{id}',['uses'=>'ProductsController@update','as'=>'updateproduct']);
});

//////////////////////  Cart

Route::get('addtocartt/{id}',['uses'=>"CartController@getaddtocart",'as'=>'addtocartt']);
Route::get('shoppingcart',['uses'=>"CartController@shoppingcart",'as'=>'shoppingcart']);
Route::get('remove/{id}',['uses'=>"CartController@getRemoveItem",'as'=>'remove']);
 Route::get('update/{id}',['uses'=>"CartController@getupdateItem",'as'=>'update']);

 Route::group(['middleware' => ['web','checkout'],], function () {
Route::get('checkout',['uses'=>"CartController@getcheckout",'as'=>'checkout']);
 });


///////////////////////admin

 Route::group(['middleware' => ['web','admin'],'prefix'=>'admin'], function () {
Route::get('/',['uses'=>"AdminController@getIndex",'as'=>'showadmin']);
Route::get('/sellerActive',['uses'=>'AdminController@sellerActive']);
Route::post('/sellerActive',['uses'=>'AdminController@sellerActive','as'=>'sellerActive']);


Route::get('deleteuser/{id}',['uses'=>"AdminController@deleteuser",'as'=>'deleteuser']);

Route::get('showusers',['uses'=>"AdminController@getusers",'as'=>'showusers']);

Route::get('deleteseller/{id}',['uses'=>"AdminController@deleteseller",'as'=>'deleteseller']);
Route::get('editseller/{id}',['uses'=>"AdminController@editseller",'as'=>'editseller']);




Route::get('adminstting',['uses'=>"AdminController@adminsetting",'as'=>'adminstting']);
 });









/////////////////test//////////////////////////
Route::get('ajaxImageUpload', ['uses'=>'AjaxImageUploadController@ajaxImageUpload']);
Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'AjaxImageUploadController@ajaxImageUploadPost']);

Route::get('images-upload', 'HomeController@imagesUpload');

Route::post('images-upload', 'HomeController@imagesUploadPost')->name('images.upload');





Route::get('massages',['uses'=>"AdminController@getmassages",'as'=>'massages']);
Route::get('deletemassage/{id}',['uses'=>"AdminController@deletemassage",'as'=>'deletemassage']);

Route::get('contact',['uses'=>"Controller@getcontact",'as'=>'contactt']);
Route::post('contact1',['uses'=>"Controller@postcontact",'as'=>'contact']);
Route::get('about',['uses'=>"Controller@about",'as'=>'about']); 
