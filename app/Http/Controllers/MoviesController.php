<?php

namespace App\Http\Controllers;

use App\Movie;
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
        return view('movies.create');
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
            'year'=>'required|integer',
            'duration'=>'required|integer'
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
        $movie = Movie::find($id);
        return view('movies.edit',compact('movie'));
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
        $request->validate([
            'movie_title'=>'required',
            'year'=>'required|integer',
            'duration'=>'required|integer'
        ]) ;

        $movie = Movie::find($id);
        $movie->movie_title = $request->get('movie_title');
        $movie->movie_year = $request->get('movie_year');
        $movie->movie_duration = $request->get('movie_duration');
        $movie->movie_genre = $request->get('movie_genre');
        $movie->movie_language = $request->get('movie_language');
        $movie->movie_plot = $request->get('movie_plot');
        $movie->movie_trailer > $request->get('movie_trailer');
        $movie->save();

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
}
