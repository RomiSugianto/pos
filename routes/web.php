<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('auth', 'SalesController@auth');

Route::get('sales', 'SalesController@index');
Route::get('sales/new', 'SalesController@new');
Route::post('sales/add', 'SalesController@add');
Route::get('sales/edit/{id}', 'SalesController@edit');
Route::post('sales/update', 'SalesController@update');
Route::get('sales/delete/{id}', 'SalesController@delete');
Route::get('sales/search', 'SalesController@search');

Route::get('product', 'ProductController@index');
Route::get('product/new', 'ProductController@new');
Route::post('product/add', 'ProductController@add');
Route::get('product/edit/{id}', 'ProductController@edit');
Route::post('product/update', 'ProductController@update');
Route::get('product/delete/{id}', 'ProductController@delete');
Route::get('product/search', 'ProductController@search');

Route::get('salesoutlet', 'SalesOutletController@index');
Route::get('salesoutlet/new', 'SalesOutletController@new');
Route::post('salesoutlet/add', 'SalesOutletController@add');
Route::get('salesoutlet/edit/{id}', 'SalesOutletController@edit');
Route::post('salesoutlet/update', 'SalesOutletController@update');
Route::get('salesoutlet/delete/{id}', 'SalesOutletController@delete');
Route::get('salesoutlet/search', 'SalesOutletController@search');

Route::get('paymentmethod', 'PaymentMethodController@index');
Route::get('paymentmethod/new', 'PaymentMethodController@new');
Route::post('paymentmethod/add', 'PaymentMethodController@add');
Route::get('paymentmethod/edit/{id}', 'PaymentMethodController@edit');
Route::post('paymentmethod/update', 'PaymentMethodController@update');
Route::get('paymentmethod/delete/{id}', 'PaymentMethodController@delete');
Route::get('paymentmethod/search', 'PaymentMethodController@search');

Route::get('salestransaction', 'SalesTransactionController@index');
Route::get('salestransaction/new', 'SalesTransactionController@new');
Route::post('salestransaction/add', 'SalesTransactionController@add');
Route::get('salestransaction/edit/{id}', 'SalesTransactionController@edit');
Route::post('salestransaction/update', 'SalesTransactionController@update');
Route::get('salestransaction/delete/{id}', 'SalesTransactionController@delete');
Route::get('salestransaction/search', 'SalesTransactionController@search');
Route::post('salestransaction/test', 'SalesTransactionController@test');