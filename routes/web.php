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


Route::get('/', function () {
    return view('index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/affiliates', 'AffiliatesController@index');
Route::view('/shop', 'shop');
Route::view('/blog', 'blog');
Route::view('/contact', 'contact');
Route::view('/blog-details', 'blog-details');
Route::view('/shopping-cart', 'shopping-cart');
Route::view('/check-out', 'check-out');
Route::view('/faq', 'faq');
// Route::view('/register', 'register');
// Route::view('/login', 'login');
