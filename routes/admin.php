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




Route::get('/users',function (Request $request){
    return User::all();
});
Route::get('/orders',function (Request $request){
    return User::all();
});
Route::get('/products',function (Request $request){
    return Products::all();
});
Route::get('/test/{id}-{slug}','ReportController@index');
Route::get('/reports',function (Request $request){
    return Report::all();
});
Route::get('/tb_list',function (Request $request){
    return User::all();
});
Route::get('/settings',function (Request $request){
    return User::all();
});

Route::view('/{path?}', 'admin/app');
