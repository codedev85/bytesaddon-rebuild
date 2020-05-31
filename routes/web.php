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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/','HomepageController@index');

//show single productb to a customer
Route::get('/product/{product}/show','HomepageController@show');

//add to cart
Route::post('/product/{product}/cart','CartController@addToCart');
Route::get('/product/{product}/cart','CartController@addToCart');
Route::get('/product/item','CartController@getItem');
//remove cart
Route::get('/cart/{cart}/remove', 'CartController@removeCart');

//product category
Route::get('/category/{category}/product','HomepageController@fetchProductCategory');

Route::group(['middleware'=>'is-ban'], function(){

    Route::middleware(['auth','last_seen'])->group(function () {

        Route::middleware(['admin'])->group(function () {

            Route::get('/dashboard','DashboardController@dashboard');

            Route::get('/all/admin','AdminMgtController@allAdmin');
            Route::get('/add/admin','AdminMgtController@create');
            Route::post('/admin/store','AdminMgtController@store');
            //change admin roles
            Route::get('/admin/{role}/permission','AdminMgtController@changeRole');
            Route::post('/admin/{role}/store','AdminMgtController@storeRole');
            Route::get('/all/roles','RoleController@allRole');
            //revoke or ban user acess
            Route::get('userUserRevoke/{id}', array('as'=> 'users.revokeuser', 'uses' => 'AdminMgtController@revoke'));
            Route::get('userBan/{id}', array('as'=> 'users.ban', 'uses' => 'AdminMgtController@b'));

            ///product  category
            Route::get('/add/category','CategoryController@addCategory');
            Route::get('/all/category','CategoryController@allCategory');
            Route::post('/category/store/','CategoryController@store');
            Route::get('/category/{cat}/update','CategoryController@edit');
            Route::post('/category/{cat}/storeupdate','CategoryController@update');

            //product routes
            Route::get('/add/product','ProductController@create');
            Route::post('/product/store','ProductController@store');
            Route::get('/product/{product}/view','ProductController@show');
            Route::get('/update/{product}/product','ProductController@edit');
            Route::post('/update/{product}/store','ProductController@update');
            //out of stock and limited stock , stock
            Route::get('/stock/{product}','ProductController@stock');
            Route::get('/out-of-stock/{product}','ProductController@outofStock');
            Route::get('/limited-stock/{product}','ProductController@limitedStock');

            Route::get('/all/products','ProductController@index');
            // all orders to be checked by admin
            Route::get('orders','OrderController@index');
            Route::get('/order/{order}/processing','OrderController@processing');
            Route::get('/order/{order}/shipped','OrderController@shipped');
            Route::get('/order/{order}/delivered','OrderController@delivered');
            Route::get('/order/{order}/cancel','OrderController@cancel');

        });
           //for users and admin
            //checkout and make payment
            Route::get('checkout','CartController@checkout');

            //make other
            Route::Post('order', 'OrderController@store');
    });

 });
