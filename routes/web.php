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

//AUTH
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//pages
Route::get('/', 'PagesController@welcome');
Route::get('/beta', 'PagesController@welcomebeta');
Route::get('/dashboard', 'PagesController@dashboard');

//Route::get('/addorder', 'PagesController@addorder');
//Route::get('/orders', 'PagesController@orders');

//orders
Route::resource('order', 'OrdersController');
Route::get('/orders', 'OrdersController@index');
Route::post('addorder/submit', 'OrdersController@submit');

Route::resource('customer', 'CustomersController');
Route::get('/customers', 'CustomersController@index');

// Route::resource('location', 'LocationsController');
// Route::get('/locations', 'LocationsController@index');

Route::resource('quoteRequest', 'QuoteRequestsController');
Route::get('/quoteRequests', 'QuoteRequestsController@index');
Route::get('/quoteRequest/{id}/print', 'QuoteRequestsController@print');
