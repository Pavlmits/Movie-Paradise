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
            'movie_duration'=>'required|integer',
            'photo'=>'image|nullable|max:1999'
        ]) ;

        if($request->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/photo/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $movie = new Movie ([
            'title' => $request->get('movie_title'),
            'year' => $request->get('movie_year'),
            'duration' => $request->get('movie_duration'),
            'genre' => $request->get('movie_genre'),
            'language' => $request->get('movie_language'),
            'plot' => $request->get('movie_plot'),
            'trailer' => $request->get('movie_trailer')
        ]);
        $movie->photo = $fileNameToStore;
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
        

        if($request->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/photo/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $movie = Movie::find($id);
        $movie->title = $request->get('movie_title');
        $movie->year = $request->get('movie_year');
        $movie->duration = $request->get('movie_duration');
        $movie->genre = $request->get('movie_genre');
        $movie->language = $request->get('movie_language');
        $movie->plot = $request->get('movie_plot');
        $movie->trailer > $request->get('movie_trailer');
        $movie->photo = $fileNameToStore;
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

    public function userShow()
    {
        $movies = Movie::all();
        return view('movieSingle',compact('movies'));

    }
}
