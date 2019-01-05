@extends('layout')

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
      <form method="post" action="{{ route('movies.store') }}">
          <div class="form-group">
              @csrf
              <label for="title">Movie Title:</label>
              <input type="text" class="form-control" name="movie_title"/>
          </div>
          <div class="form-group">
              <label for="duration">Duration :</label>
              <input type="text" class="form-control" name="movie_duration"/>
          </div>
          <div class="form-group">
              <label for="genre">Genre :</label>
              <input type="text" class="form-control" name="movie_genre"/>
          </div>
          <div class="form-group">
              <label for="language">Language :</label>
              <input type="text" class="form-control" name="movie_language"/>
          </div>
          <div class="form-group">
              <label for="plot">Plot :</label>
              <input type="text" class="form-control" name="movie_plot"/>
          </div>
          <div class="form-group">
              <label for="photo">Photo :</label>
              <input type="text" class="form-control" name="movie_photo"/>
          </div>
          <div class="form-group">
              <label for="trailer">Trailer Url :</label>
              <input type="text" class="form-control" name="movie_trailer"/>
          </div>
          <div class="form-group">
              <label for="year">Release Year:</label>
              <input type="text" class="form-control" name="movie_year"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection