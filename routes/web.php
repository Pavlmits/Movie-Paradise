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

Route::get('/index', 'PagesController@index');

Route::resource('movies','MoviesController');
Route::resource('stars','StarsController');
Route::resource('directors','DirectorsController');


Auth::routes();
Route::get('/movies/shows',function(){
    $movies = Movie::all();
    return view('movieSingle',compact('movies'));

});
Route::get('/about',function(){
    return view('about');
});
Route::get('/dashboard', 'DashboardController@index');

