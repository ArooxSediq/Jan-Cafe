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

// Pages
Route::get('/','PagesController@home');
Route::get('/admin','PagesController@admin');
Route::get('/waiter','PagesController@waiter');


//Requests

Route::resource('Items', 'ItemsController');
Route::resource('Orders', 'OrdersController');