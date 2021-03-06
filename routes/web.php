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
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Socialites

Route::get('auth/facebook', ['as'=>'facebook' , 'uses'=> 'Auth\LoginController@redirectToFacebookProvider'] );
 
Route::get('auth/facebook/callback', ['as'=>'facebook/callback','uses'=>'Auth\LoginController@handleProviderFacebookCallback']);

// twitter socialite

Route::get('auth/twitter', ['as'=>'twitter' , 'uses'=> 'Auth\LoginController@redirectToTwitterProvider']);

Route::get('auth/twitter/callback', ['as'=>'twitter/callback','uses'=>'Auth\LoginController@handleProviderTwitterCallback']);

// google

Route::resource('events','EventController'); 
Route::get('/events', 'EventController@index')->name('events');



//home Pages
//Route::get('pages','PageController');
Route::get('about', 'PageController@index')->name('about');
Route::get('contact', 'PageController@contact')->name('contact');
//bookings
Route::resource('bookings','BookingController');

Route::post('/submit', 'EventController@date');

//request
Route::get('reques/{id}',['uses'=>'RequeController@store','as'=>'reques.store']);


