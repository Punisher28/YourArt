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

use App\User;
use Illuminate\Http\Request;

Route::get('/', 'IndexController@index')->name('index');
Auth::routes(['verify' => true]);

Route::get('profile', 'HomeController@index')->name('home');
Route::post('profile/changePass', 'HomeController@changePass')->name('changePass');
Route::post('profile/changeImg', 'HomeController@changeImg')->name('changeImg');

Route::get('articles/','ArticlesController@index')->name('list');
Route::get('item/{id}','ArticlesController@view')->name('item');

Route::get('addcart/{id}','CartController@getAddToCart')->name('addcart');
Route::get('dellcart','CartController@dellToCart')->name('dellcart');
Route::get('cart', 'CartController@index')->name('index.cart');

Route::get('test','TestController@test');
Route::post('test/post','TestController@testaja')->name('storage');

Route::get('parse','ParseController@test');
