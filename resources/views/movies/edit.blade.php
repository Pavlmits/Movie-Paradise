@extends('layout')

@section('content')
  <h1>Edit Movie</h1>
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
    {!! Form::open(['action' => ['MoviesController@update',$movie->id],'method'=>'PUT', 'enctype' => 'multipart/form-data'])!!}
      <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$movie->title,['class'=>'form-control','placeholder'=>'Title'])}}
          </div>
          <div class="form-group">
            {{Form::label('duration','Duration')}}
            {{Form::text('duration',$movie->duration,['class'=>'form-control','placeholder'=>'Duration'])}}
          </div>
          <div class="form-group">
            {{Form::label('year','Year')}}
            {{Form::text('year',$movie->year,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Year'])}}
          </div>
          <div class="form-group">
            {{Form::label('language','Language')}}
            {{Form::text('language',$movie->language,['class'=>'form-control','placeholder'=>'Language'])}}
          </div>
          <div class="form-group">
            {{Form::label('photo','Photo')}}
            {{Form::text('photo',$movie->photo,['class'=>'form-control','placeholder'=>'Photo'])}}
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
            {{Form::label('plot','Plot')}}
            {{Form::textarea('plot',$movie->plot,['class'=>'form-control','placeholder'=>'Plot'])}}
          </div>
          <div class="form-group">
            {{Form::label('trailer','Trailer')}}
            {{Form::text('trailer',$movie->trailer,['class'=>'form-control','placeholder'=>'Trailer'])}}
          </div>
          <div class="form-group" >
            <label for="photo">Photo :</label>
                {{Form::file('photo')}}
          </div>
          {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}

@endsection