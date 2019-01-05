<?php

namespace App\Http\Controllers;

use App\Director;
use Illuminate\Http\Request;

class DirectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::orderBy('name','asc')->paginate(10);
        return view('directors.index')->with('directors',$directors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'name' => 'required',
            'bio'=>'required'
        ]);

        $director = new Director;
        $director->name = $request->input('name');
        $director->bio = $request->input('bio');
        $director->save();
        
        return redirect('/directors')->with('success', 'Director has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $director = Director::find($id);
        return view('directors.show')->with('director',$director);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director = Director::find($id);

        return view('directors.edit')->with('director',$director);
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
        $this -> validate($request,[
            'name' => 'required',
            'bio'=>'required'
        ]);

        $director = Director::find($id);
        $director->name = $request->input('name');
        $director->bio = $request->input('bio');
        $director->save();
        
        return redirect('/directors')->with('success', 'Director has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $director = Director::find($id);
        $director->delete();

        return redirect('/directors')->with('success','Director has been deleted successfully');
    }
}
