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



Route::get('/', 'ProductController@index')->name('main');
Route::get('/запчасти_для_телевизоров', 'ProductController@index');


/**
 * Home page
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@PaymentDetailsUserPush')->name('home.push');
Route::get('/home/delete', 'HomeController@PaymentDetailsUserDelete')->name('home.delete');


Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');

Auth::routes();


/**
 * Page Routes
 */
Route::get('/catalog', 'ProductController@getAllProduct')->name('catalog');
Route::get('/catalog/{part_types_id}', 'ProductController@getFullCategory')->name('category.show');
Route::get('/catalog/tv/{company}/{model}', 'ProductController@getTvCategory')->name('category.tv');

Route::post('/add/{id}/{qty}', 'ProductController@addProductToCart')->name('addproduct');
Route::post('/add/set/{id}/{qty}', 'ProductController@addSetToCart')->name('addset');

Route::get('/product/{slug}', 'ProductController@getItemProduct')->name('product.show');
Route::get('/set/{slug}', 'ProductController@getItemSet')->name('set.show');

Route::get('/cart', 'CartController@getPage')->name('cart');
Route::get('/cart/destroy/{cart_id}', 'CartController@destroyProduct')->name('cart.destroy');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::post('/checkout', 'CartController@checkoutPost')->name('checkout.post');


/**
 * Static Page
 */
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contacts', 'ContactController@getPageContact')->name('contacts');
Route::post('/contacts', 'ContactController@mailpost')->name('contacts.mail');

Route::get('/delivery', 'ContactController@getPageDelivery')->name('delivery');
Route::get('/private', 'ContactController@getPagePrivate')->name('private');
Route::get('/regulations', 'ContactController@getPageRegulations')->name('regulations');

/**
 * Search Route
 */
Route::get('/search','SearchController@search');
Route::get('/catalog/search/{search}', 'ProductController@getSearchProduct')->name('search.product');

/**
 * Search Route mobile link
 */
Route::get('/find','SearchController@getMobilePage')->name('search.mobile');

/**
 * Sale Form 
 */
Route::post('/saleform', function() {
    return view('includes/saleform');
});
Route::post('/saleform/push', 'CartController@saleFormPush')->name('saleform.push');

/**
 * Quantity From
 */
Route::post('/addquantity', 'ProductController@addQuantity');
Route::post('/addsetquantity', 'ProductController@addSetQuantity');


