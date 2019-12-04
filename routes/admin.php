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




Route::get('/users', 'App\Http\Controllers\Admin\AdminController@getUser')->name('users');
Route::get('/orders','App\Http\Controllers\Admin\AdminController@getOrders');
Route::get('/products','App\Http\Controllers\Admin\AdminController@getProducts');
Route::get('/test/{id}-{slug}','ReportController@index');
Route::get('/reports','App\Http\Controllers\Admin\AdminController@getReports');
Route::get('/table_list','App\Http\Controllers\Admin\AdminController@getTablesList');
Route::get('/settings','App\Http\Controllers\Admin\AdminController@getUser');

Route::view('/{path?}', 'admin/app');
