<?php

use App\Product;
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
    $allProducts = Product::take(20)->get();
    // dd($allProducts);
    return view('index',compact('allProducts'));
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/affiliates', 'AffiliatesController@index');
Route::get('/shop', 'CardController@shop');
Route::view('/blog', 'blog');
Route::view('/contact', 'contact');
Route::view('/blog-details', 'blog-details');
Route::view('/shopping-cart', 'shopping-cart');
Route::view('/check-out', 'check-out');
Route::view('/faq', 'faq');

//afiliates
Route::get('/affiliates', 'AffiliatesController@index');
Route::get('/create', 'AffiliatesController@add');
Route::post('/store', 'AffiliatesController@save')->name('store');
Route::get('/edit/{id}', 'AffiliatesController@edit');
Route::get('/delete/{id}', 'AffiliatesController@delete');
Route::post('/update/{id}', 'AffiliatesController@update');
Route::get('/profile', 'ProfileController@profile');
Route::post('/changePassword', 'ProfileController@changePassword');
Route::get('/profile_photo','ProfileController@profile_photo');
Route::post('/profile_update','ProfileController@profile_Saved');


//card
Route::get('/add-to-card/{product}','CardController@add')->name('cart.add')->middleware('auth');
// Route::get('/add-to-card/{product}','CardController@index')->name('card.add')->middleware('auth');
// Route::get('/card','CardController@index')->name('card.index')->middleware('auth');
Route::get('/card','CardController@index')->name('cart.index')->middleware('auth');
Route::get('/card.destroy/{id}','CardController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/card.update/{id}','CardController@update')->name('cart.update')->middleware('auth');
Route::get('/card.clearAll','CardController@clearAll')->name('cart.clearAll')->middleware('auth');

//product master
Route::get('/AddProductType','ProductMasterController@AddProductType');
Route::get('/addNewProductType','ProductMasterController@addNewProductType');
Route::post('/saveProductType','ProductMasterController@saveProductType');
Route::get('/showProductType','ProductMasterController@showProductType');
Route::get('/getProductSubTypeDetails','ProductMasterController@getProductSubTypeDetails');


//add product
Route::resource('Products','ProductController');
Route::post('storeProducts','ProductController@store');
Route::get('demo','DemoController@index');
