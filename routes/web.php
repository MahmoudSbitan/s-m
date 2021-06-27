<?php

use Illuminate\Support\Facades\Route;

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

//Users Pages
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/show', 'HomeController@show2');

//Admin pages
Route::get('/panels/usersPanel', 'AdminController@userspanel');
Route::get('/panels/categoryPanel', 'CategoryController@index');
Route::get('/panels/newCategory', 'CategoryController@create');
Route::get('/panels/itemPanel', 'ItemController@index');
Route::get('/panels/salePanel', 'SaleController@index');
Route::get('/panels/reportPanel', 'ReportController@index');

//Seller pages
Route::get('/seller/itemPanel', 'ItemController@itemspanel');
Route::get('/seller/newItem', 'ItemController@create');

//cart pages
Route::get('/payment', 'CartController@payment');
Route::get('cart', 'CartController@cart');
Route::get('add-to-cart/{id}', 'CartController@addToCart');
Route::patch('update-cart', 'CartController@update');
Route::delete('remove-from-cart', 'CartController@remove');


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return redirect('/home');
})->name('dashboard');

Route::resource('home', 'HomeController');
Route::resource('admin', 'AdminController');
Route::resource('category', 'CategoryController');
Route::resource('item', 'ItemController');
Route::resource('sale', 'SalesController');
Route::resource('report', 'ReportController');
Route::resource('cart', 'CartController');