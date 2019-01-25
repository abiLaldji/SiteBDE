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
});

Route::get('signIn', function () {
	return view('signIn');
})->name('signIn');

Route::get('signUp', function (){
	return view('signUp');
})->name('signUp');

Route::get('cart', function (){
	return view('cart');
});


Route::get('addProduct', function (){
	return view('addProduct');
});

Route::get('events', function(){
	return view('events');
});

Route::get('pastEvents', function () {
	return view('pastEvents');
});

Route::get('ideaBox', function ()
{
	return view('ideaBox');
});

Route::get('contact', function()
{
	return view('contact');
});

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

Route::get('deconnexion', 'Controller@deconnect');

Route::post('signUp', 'Controller@signUp');

Route::post('signIn', 'Controller@signIn');

Route::post('addProduct', 'Controller@addProduct');

Route::post('submitIdea', 'Controller@submitIdea');
