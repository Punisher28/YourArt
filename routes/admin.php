<?php
/*
 *
 * ------Admin-routes---------------
 *
 * */

use App\Report;
use App\User;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/users', 'AdminController@getUser')->name('users');
Route::get('/orders','AdminController@getOrders');
Route::get('/products','AdminController@getProducts');
Route::get('/test/{id}-{slug}','ReportController@index');
Route::get('/reports','AdminController@getReports');
Route::get('/table_list','AdminController@getTablesList');
Route::get('/settings','AdminController@getUser');

Route::view('/{path?}', 'admin/app');
