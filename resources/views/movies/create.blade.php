@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Movie
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    {!! Form::open(['action' => 'MoviesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <form method="post" action="{{ route('movies.store') }}">
          <div class="form-group">
              @csrf
              <label for="title">Movie Title:</label>
              <input type="text" class="form-control" name="movie_title" value="{{ old('movie_title') }}"/>
          </div>
          <div class="form-group">
              <label for="duration">Duration :</label>
              <input type="text" class="form-control" name="movie_duration" value="{{ old('movie_duration') }}" />
          </div>
          <div class="form-group">
              <label for="language">Language :</label>
              <input type="text" class="form-control" name="movie_language" value="{{ old('movie_language') }}"/>
          </div>
          <div class="form-group">
              <label for="plot">Plot :</label>
              <input type="text" class="form-control" name="movie_plot" value="{{ old('movie_plot') }}"/>
          </div>
          <div class="form-group">
             <label for="genre">Genre :</label>
             <select class="form-control" name="genre_id">
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{$genre->name}}</option>    
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="trailer">Trailer Url :</label>
              <input type="text" class="form-control" name="movie_trailer" value="{{ old('movie_trailer') }}"/>
          </div>
          <div class="form-group">
              <label for="year">Release Year:</label>
              <input type="text" class="form-control" name="movie_year" value="{{ old('movie_year') }}"/>
          </div>
          <div class="form-group" >
            <label for="photo">Photo :</label>
            <input type="text" class="form-control" name="movie_photo" value="{{ old('movie_photo') }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
      {!! Form::close() !!}
  </div>
</div>
@endsection