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
use App\Movie;

Route::get('/', function () {
    //$title = 'Welcome to Movie Paradise';
    $movies = Movie::all();
    return view('welcome',compact('movies'));
});

Route::get('/index', 'PagesController@index')->middleware('user');

Route::resource('movies','MoviesController')->middleware('user');
Route::resource('series','SeriesController')->middleware('user');
Route::resource('reviews','ReviewsController')->middleware('user');
Route::resource('stars','StarsController')->middleware('user');
Route::resource('directors','DirectorsController')->middleware('user');


Auth::routes();
Route::get('/home',function(){
    return view('movieSingle');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('/dashboard', 'DashboardController@index');

