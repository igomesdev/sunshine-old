<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;
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

Auth::routes();

//email
Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

//follow
Route::post('follow/{user}', 'FollowsController@store');

//home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

//users
Route::get('/users', 'UsersController@index');

//legal
Route::get('/legal/cookie-policy', 'legalController@cookiePolicy');
Route::get('/legal/privacy-policy', 'legalController@privacy');
Route::get('/legal/terms-and-conditions', 'legalController@termsAndConditions');

//footer
Route::get('/footer/about-us', 'FooterController@aboutUs');
Route::get('/footer/contact-us', 'FooterController@contactUs');
Route::get('/footer/guides', 'FooterController@guides');

//post
Route::get('/p/create', 'PostsController@create');
Route::get('/p/{post}', 'PostsController@show');
Route::get('/p/{post}/edit', 'PostsController@edit');

Route::get('/p/{post}/delete', 'PostsController@delete');
Route::delete('/p/{post}/delete', 'PostsController@destroy')->name('post.destroy');;

Route::get('/{post}', 'PostsController@index');
Route::post('/p', 'PostsController@store');
Route::patch('/p/{post}', 'PostsController@update');

//profile
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


