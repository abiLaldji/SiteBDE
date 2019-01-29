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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('signIn', function () {
	return view('signIn');
})->name('signIn');

Route::get('signUp', function (){
	return view('signUp');
})->name('signUp');

Route::get('cart', function (){
	return view('cart');
})->name('cart');

Route::get('addProduct', function (){
	return view('addProduct');
})->name('addProduct');

Route::get('events', function(){
	return view('events');
})->name('events');

Route::get('pastEvents', function () {
	return view('pastEvents');
})->name('pastEvents');

Route::any('ideaBox', function ()
{
	return view('ideaBox');
})->name('ideaBox');

Route::get('contact', function()
{
	return view('contact');
})->name('contact');


Route::get('legalNotice', function(){
	return view('legalNotice');
});

Route::get('privacyPolicy', function() {
	return view('privacypolicy');
});

Route::get('terms&conditions', function()
{
	return view('terms&conditions');
});

Route::get('commentImageEvent', function (){
	return view('commentImageEvent');
});

Route::get('imageEvent', function (){
	return view('imageEvent');
});

Route::get('myAccount', function (){
	return view('myAccount');
})->name('myAccount');

Route::get('shop', function (){
	return view('shop');
});

Route::get('header', function (){
	return view('header');
})->name('header');

Route::get('headerShop', function (){
	return view('headerShop');
});

Route::get('shop/{category}', function($category){
	return view('shopCategory', ['name' => $category]);
});

Route::get('shop/{category}/{product}', function ($product){
	return view('shopArticle');
});

Route::get('deconnexion', 'Controller@deconnect');

Route::post('signUp', 'Controller@signUp');

Route::post('signIn', 'Controller@signIn');

Route::post('addProduct', 'Controller@addProduct');

Route::post('submitIdea', 'Controller@submitIdea');

Route::post('putUser', 'Controller@updateUser');

Route::get('acceptCookies', 'Controller@acceptCookies');

Route::get('declineCookies', 'Controller@declineCookies');

Route::post('addToCart', 'Controller@addToCart');

Route::post('makeOrder', 'Controller@makeOrder');

Route::post('deleteFromCart', 'Controller@deleteFromCart');

Route::get('downloadAllEventPictures', 'Controller@downloadAllEventPictures');

Route::get('approveIdea/{id}', 'Controller@approveEvent');

Route::get('declineIdea/{id}', 'Controller@privateEvent');

Route::get('subscribe/{id}', 'Controller@subscribe');
