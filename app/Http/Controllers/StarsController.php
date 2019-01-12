<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Star;

class StarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Star::orderBy('name','asc')->paginate(10);
        return view('stars.index')->with('stars',$stars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stars.create');
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
            'bio'=>'required',
            'photo'=>'required'
        ]);


        $star = new Star;
        $star->name = $request->input('name');
        $star->bio = $request->input('bio');
        $star->photo =$request->input('photo');
        $star->save();
        
        return redirect('/stars')->with('success', 'Actor has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $star = Star::find($id);
        return view('stars.show')->with('star',$star);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $star = Star::find($id);

        return view('stars.edit')->with('star',$star);
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
            'bio'=>'required',
            'photo'=>'required'
        ]);

        $star = Star::find($id);
        $star->name = $request->input('name');
        $star->bio = $request->input('bio');
        $star->bio = $request->input('photo');

        $star->save();
        
        return redirect('/stars')->with('success', 'Actor has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $star = Star::find($id);
        $star->delete();

        return redirect('/stars')->with('success','Star has been deleted successfully');
    }
}
