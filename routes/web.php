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

Route::get('/', 'OrderController@index');

Auth::routes(['verify' => true]);
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::post('/password/SetFirstPassPassword', 'Auth\ResetPasswordController@SetFirstPassPassword')->name('first.password');
Route::post('/password/sendPasswordReset', 'Auth\ResetPasswordController@sendPasswordReset')->name('send.password');
Route::get('/home', 'HomeController@index')->name('home');


/**********
ORDERS 
**********/
/* Users */
Route::get('/orders/show/{id}', 'OrderController@show')->middleware('role:user');
Route::get('/orders', 'OrderController@index');
Route::post('/getDocuments', 'DocumentController@getDocuments')->middleware('auth'); // Ajax call to get documents by order id
Route::get('/admin/users/destroy/{id}', 'UserController@destroy')->middleware('role:editor,manager,director,admin')->name('user.delete');
Route::get('/admin/users', 'UserController@index')->middleware('role:editor,manager,director,admin');
Route::get('/admin/users/create', 'UserController@create')->middleware('role:editor,manager,director,admin');
Route::post('/admin/users/store', 'UserController@store')->middleware('role:editor,manager,director,admin');


/* Orders */
Route::get('/admin/orders', 'OrderController@index')->middleware('role:editor,manager,director,admin');
Route::get('/admin/orders/create', 'OrderController@create')->middleware('role:editor,manager,director,admin');
Route::post('/admin/orders/store', 'OrderController@store')->middleware('role:editor,manager,director,admin');
Route::get('/admin/orders/edit/{id}', 'OrderController@edit')->middleware('role:editor,manager,director,admin')->name('order.edit');
Route::patch('/admin/orders/update/{id}', 'OrderController@update')->middleware('role:editor,manager,director,admin');
Route::delete('/admin/orders/destroy/{id}', 'OrderController@destroy')->middleware('role:editor,manager,director,admin')->name('order.delete');
Route::post('/updateShipment', 'OrderController@updateShipment')->middleware('role:editor,manager,director,admin');

/* Documents */
Route::get('/admin/documents/create', 'DocumentController@create')->middleware('role:editor,manager,director,admin');
Route::post('/admin/documents/store', 'DocumentController@store')->middleware('role:editor,manager,director,admin');
Route::get('/documents/download/{id}', 'DocumentController@download')->middleware('auth');
Route::get('/admin/documents/destroy/{id}', 'DocumentController@destroy')->middleware('role:editor,manager,director,admin')->name('document.delete');

/* Shipments */
Route::get('/admin/shipments', 'ShipmentController@index')->middleware('role:editor,manager,director,admin');
Route::get('/admin/shipments/create', 'ShipmentController@create')->middleware('role:editor,manager,director,admin');
Route::post('/admin/shipments/store', 'ShipmentController@store')->middleware('role:editor,manager,director,admin');
Route::get('/admin/shipments/edit/{id}', 'ShipmentController@edit')->middleware('role:editor,manager,director,admin')->name('shipment.edit');
Route::patch('/admin/shipments/update/{id}', 'ShipmentController@update')->middleware('role:editor,manager,director,admin');
Route::delete('/admin/shipments/destroy/{id}', 'ShipmentController@destroy')->middleware('role:editor,manager,director,admin')->name('shipment.delete');
Route::get('/listShipments', 'ShipmentController@listShipments')->middleware('role:editor,manager,director,admin');

/* Places */
Route::get('/getPlacesList/{type?}', function ($type = null) {
    return Helpers::getPlacesList($type);
});

/* Customers */
Route::get('/admin/customers', 'CustomerController@index')->middleware('role:editor,manager,director,admin');
Route::get('/admin/customers/create', 'CustomerController@create')->middleware('role:editor,manager,director,admin');
Route::post('/admin/customers/store', 'CustomerController@store')->middleware('role:editor,manager,director,admin');
Route::get('/admin/customers/edit/{id}', 'CustomerController@edit')->middleware('role:editor,manager,director,admin')->name('customer.edit');
Route::patch('/admin/customers/update/{id}', 'CustomerController@update')->middleware('role:editor,manager,director,admin');
Route::delete('/admin/customers/destroy/{id}', 'CustomerController@destroy')->middleware('role:editor,manager,director,admin')->name('customer.delete');

/* Places */
Route::get('/admin/places', 'PlaceController@index')->middleware('role:editor,manager,director,admin');
Route::get('/admin/places/create', 'PlaceController@create')->middleware('role:editor,manager,director,admin');
Route::post('/admin/places/store', 'PlaceController@store')->middleware('role:editor,manager,director,admin');
Route::get('/admin/places/edit/{id}', 'PlaceController@edit')->middleware('role:editor,manager,director,admin')->name('place.edit');
Route::patch('/admin/places/update/{id}', 'PlaceController@update')->middleware('role:editor,manager,director,admin');
Route::delete('/admin/places/destroy/{id}', 'PlaceController@destroy')->middleware('role:editor,manager,director,admin')->name('place.delete');