@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
          <td>Movie</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{$movie->title}}</td>
            <td><a href="/deletemovie/{{Auth::user()->getId()}}/{{$movie->id}}" class="btn btn-primary">Unlike</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@endsection