@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Movie Title</td>
          <td>Duration</td>
          <td>Year</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{$movie->id}}</td>
            <td>{{$movie->movie_title}}</td>
            <td>{{$movie->movie_duration}}</td>
            <td>{{$movie->movie_year}}</td>
            <td><a href="{{ route('movies.edit',$movie->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('movies.destroy', $movie->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection