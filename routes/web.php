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
    //$title = 'Welcome to Movie Paradise';
    return view('welcome');
});

Route::get('/index', 'PagesController@index');

Route::resource('movies','MoviesController');
Route::resource('series','SeriesController');
Route::resource('reviews','ReviewsController');
Route::resource('stars','StarsController');
Route::resource('directors','DirectorsController');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

