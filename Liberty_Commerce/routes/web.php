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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@catalogue')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/catalogue', 'HomeController@catalogue')->name('catalogue');
Route::get('/produit', 'HomeController@produit')->name('produit');
Route::get('/basket', 'HomeController@basket')->name('basket');
Route::get('/phone', 'HomeController@phone')->name('phone');
Route::get('/tablet', 'HomeController@tablet')->name('tablet');
Route::get('/laptop', 'HomeController@laptop')->name('laptop');
Route::get('/software', 'HomeController@software')->name('software');
Route::get('/console', 'HomeController@console')->name('console');

Route::get('/admin', 'AdminController@admin')->name('admin');
Route::post('/produit', 'AdminController@add')->name('produit');
