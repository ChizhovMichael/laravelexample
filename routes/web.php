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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


/**
 * Page Routes
 */

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/catalog', 'ProductController@getAllProduct')->name('catalog');
Route::get('/catalog/{part_types_id}', 'ProductController@getFullCategory')->name('category.show');
Route::get('/catalog/tv/{company}/{model}', 'ProductController@getTvCategory')->name('category.tv');

Route::post('/add/{id}/{qty}', 'ProductController@addProductToCart')->name('addproduct');
Route::post('/add/set/{id}/{qty}', 'ProductController@addSetToCart')->name('addset');
Route::get('/contacts', 'ContactController@getPage')->name('contacts');

Route::get('/product/{slug}', 'ProductController@getItemProduct')->name('product.show');
Route::get('/set/{slug}', 'ProductController@getItemSet')->name('set.show');
Route::post('/addproduct', 'ProductController@addToCartItemProduct')->name('product.add');

Route::get('/cart', 'CartController@getPage')->name('cart');

Route::get('/delivery', function () {
    return view('page/delivery');
})->name('delivery');


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



