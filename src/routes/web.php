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

// Search Routes
Route::get('/', 'WelcomeController@index');
Route::get('/search', 'WelcomeController@search');

// Cart Routes
Route::get('/cart', 'CartController@index');
Route::get('/cart/email', 'CartController@notyet');
Route::get('/cart/print', 'CartController@notyet');
Route::get('/cart/add/{product}', 'CartController@add');
Route::delete('/cart/{cart}', 'CartController@destroy');

// Cart Items Routes
Route::delete('/cartitem/{cartitem}', 'CartItemsController@destroy');

// Checkout Routes
Route::get('/checkout', 'CheckoutController@index');
Route::patch('/checkout/{cart}', 'CheckoutController@update');
Route::get('/thankyou/{cart}', 'CheckoutController@placed');

// Product Routes
Route::get('/products', 'ProductController@index');
