<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Genre;
use App\User;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
      
        return view('movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_title'=>'required',
            'movie_year'=>'required|integer',
            'movie_duration'=>'required|integer'
            
        ]) ;

        $movie = new Movie ([
            'title' => $request->get('movie_title'),
            'year' => $request->get('movie_year'),
            'duration' => $request->get('movie_duration'),
            'genre' => $request->get('movie_genre'),
            'language' => $request->get('movie_language'),
            'plot' => $request->get('movie_plot'),
            'trailer' => $request->get('movie_trailer')
        ]);
        $movie->photo = $request->get('movie_photo');
            $movie->save();

            return redirect('/movies')->with('success', 'Movie has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genres = Genre::all();
        $movie = Movie::find($id);
        return view('movies.edit',compact('movie','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $movie = Movie::find($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->duration = $request->input('duration');
        $movie->language = $request->input('language');
        $movie->plot = $request->input('plot');
        $movie->trailer > $request->input('trailer');
        $movie->photo = $request->input('photo');
        $movie->save();
        $movie->genres()->attach($request->get('genre'));

        return redirect('/movies')->with('success', 'Movie has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect('/movies')->with('success', 'Movie has been deleted Successfully');
    }

    public function userShow()
    {
        $movies = Movie::all();
        return view('movieSingle',compact('movies'));

    }
}
