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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'HomeController@test')->middleware('role:user');

/**********
ORDERS 
**********/
/* Users */
Route::get('/orders/show/{id}', 'OrderController@show')->middleware('role:user');
Route::get('/orders', 'OrderController@index');

/* Admin */
Route::get('/admin/orders', 'OrderController@index')->middleware('role:editor,manager,director,admin');
Route::get('/admin/orders/create', 'OrderController@create')->middleware('role:editor,manager,director,admin');
Route::post('/admin/orders/store', 'OrderController@store')->middleware('role:editor,manager,director,admin');

/* Documents */
Route::get('/documents/download/{id}', 'DocumentController@download')->middleware('role:user');