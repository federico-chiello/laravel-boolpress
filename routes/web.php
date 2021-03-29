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

//Rotta riferita all'homecontroller pubblico
Route::get('/', 'HomeController@index')->name('index');
Route::get('/posts', 'PostController@index')->name('guests.posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('guests.posts.show');
Route::get('/contacts', 'HomeController@contacts')->name('guests.contacts');
Route::post('/contacts', 'HomeController@contactsSent')->name('guests.contacts.sent');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//Rotta riferita all'homecontroller amministrativo
Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/post', 'PostController');
});
