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

Route::get('/о_нас', 'AboutController@index')->name('about');

Route::get('/каталог', 'ProductController@getAllProduct')->name('catalog');

Route::get('/каталог/{part_types_id}', 'ProductController@getFullCategory')->name('category.show');

Route::post('/add/{id}/{type}/{company}/{tv}/{img}/{name}/{qty}/{price}', 'ProductController@addProductToCart')->name('addproduct');

Route::get('/контакты', 'ContactController@getPage')->name('contacts');

Route::get('/продукт/{slug}', 'ProductController@getItemProduct')->name('product.show');
Route::post('/addproduct', 'ProductController@addToCartItemProduct')->name('product.add');

Route::get('/корзина', 'CartController@getPage')->name('cart');

Route::get('/доставка', function () {
    return view('page/delivery');
})->name('delivery');




/**
 * Search Route
 */
Route::get('/search','SearchController@search');
Route::get('/каталог/поиск/{search}', 'ProductController@getSearchProduct')->name('search.product');

/**
 * Search Route mobile link
 */
Route::get('/find','SearchController@getMobilePage')->name('search.mobile');



