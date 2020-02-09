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


/**
 * Admin Route
 */
Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');
Route::post('/productedit', 'AdminController@productEditContent');
Route::post('/productupdate', 'AdminController@productUpdateContent')->name('product.update');
// Navigation
Route::get('/admin/navigation', 'AdminController@navigationEdit')->name('admin.navigation');
// Navigation Create
Route::post('/admin/navigation/add/section', 'AdminController@navigationEditAddSection')->name('admin.navigation.add.section');
Route::post('/admin/navigation/add/subsection', 'AdminController@navigationEditAddSubsection')->name('admin.navigation.add.subsection');
// Navigation Update
Route::post('/admin/navigation/save/section', 'AdminController@navigationEditSaveSection')->name('admin.navigation.save.section');
Route::post('/admin/navigation/save/subsection', 'AdminController@navigationEditSaveSubsection')->name('admin.navigation.save.subsection');
// Navigation Delete
Route::get('/admin/navigation/delete/section', 'AdminController@navigationEditDeleteSection')->name('admin.navigation.delete.section');
Route::get('/admin/navigation/delete/subsection', 'AdminController@navigationEditDeleteSubsection')->name('admin.navigation.delete.subsection');

// Contact
Route::get('/admin/contact', 'AdminController@contactEdit')->name('admin.contact');
// Contact Create
Route::post('/admin/contact/add', 'AdminController@contactEditAdd')->name('admin.contact.add');
// Contact Update
Route::post('/admin/contact/update', 'AdminController@contactEditUpdate')->name('admin.contact.update');
// Contact Delete
Route::get('/admin/contact/delete', 'AdminController@contactEditDelete')->name('admin.contact.delete');

// Order
Route::get('/admin/order', 'AdminController@orderEdit')->name('admin.order');
Route::get('/admin/order/all', 'AdminController@orderEditAll')->name('admin.order.all');
// Order Detail
Route::get('/admin/order/{id}', 'AdminController@orderEditDetail')->name('admin.order.detail');
Route::get('/admin/order/delete/part', 'AdminController@orderEditDetailDeletePart')->name('admin.order.detail.delete.part');
// Order Checked
Route::post('/admin/order/checked', 'AdminController@orderEditChecked')->name('admin.order.checked');
// Order Cancel Checked
Route::post('/admin/order/delete', 'AdminController@orderEditDelete')->name('admin.order.delete');
// Order Tracking
Route::post('/admin/order/tracking', 'AdminController@orderEditTracking')->name('admin.order.tracking');




// Sales
Route::get('/admin/sales', 'AdminController@salesEdit')->name('admin.sales');

// Get Offer
Route::get('/admin/getoffer', 'AdminController@getofferEdit')->name('admin.getoffer');
Route::post('/admin/getoffer/checked', 'AdminController@getofferEditChecked')->name('admin.getoffer.checked');

// Box
Route::get('admin/box', 'AdminController@boxEdit')->name('admin.box');
Route::get('admin/box/unsort', 'AdminController@boxEditUnsort')->name('admin.box.unsort');
Route::post('admin/box/unsort/add', 'AdminController@boxEditUnsortAdd')->name('admin.box.unsort.add');
Route::get('admin/box/control', 'AdminController@boxEditControl')->name('admin.box.control');
Route::get('admin/box/control/{id}', 'AdminController@boxEditControlDetail')->name('admin.box.control.detail');
Route::post('admin/box/control/save', 'AdminController@boxEditControlDetailSave')->name('admin.box.control.detail.save');
Route::post('admin/box/control/create', 'AdminController@boxEditControlDetailCreate')->name('admin.box.control.detail.create');

// Buying Up (Скупка)
Route::get('admin/buyup', 'AdminController@buyupEdit')->name('admin.buyup');
Route::get('admin/buyup/{id}', 'AdminController@buyupEditDetail')->name('admin.buyup.detail');
Route::post('admin/buyup/update', 'AdminController@buyupEditDetailUpdate')->name('admin.buyup.detail.post');


// Repair
Route::get('admin/repair', 'AdminController@repairEdit')->name('admin.repair');


// List
Route::get('admin/list', 'AdminController@listEdit')->name('admin.list');
Route::get('admin/list/txt', 'AdminController@listEditTxt')->name('admin.list.txt');
Route::get('admin/list/avito', 'AdminController@listEditAvito')->name('admin.list.avito');
Route::post('admin/list/avito', 'AdminController@listEditAvito')->name('admin.list.avito.post');
Route::get('admin/list/avitotvmodels', 'AdminController@listEditAvitoModels')->name('admin.list.avitotvmodels');
Route::post('admin/list/avitotvmodels', 'AdminController@listEditAvitoModels')->name('admin.list.avitotvmodels.post');
Route::get('admin/list/monitor', 'AdminController@listEditMonitor')->name('admin.list.monitor');

// Static Text
Route::get('admin/statictext', 'AdminController@statictextEdit')->name('admin.statictext');
Route::get('admin/statictext/delivery', 'AdminController@statictextEditDelivery')->name('admin.statictext.delivery');
Route::get('admin/statictext/contacts', 'AdminController@statictextEditContacts')->name('admin.statictext.contacts');
Route::post('admin/statictext', 'AdminController@statictextEditUpdate')->name('admin.statictext');


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

/**
 * Skypka
 */
Route::get('/skypkatv', 'CartController@getSkypkaPage')->name('skypka');
Route::post('/skypkatv/post', 'CartController@skypkaAdd')->name('skypka.post');


