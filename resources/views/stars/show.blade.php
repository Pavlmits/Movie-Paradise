@extends('layouts.app')

@section('content')
      <a href="/stars" class="btn btn-default">Go Back</a>
      <h1>{{$star->name}}</h1>
      <div>
            {!!$star->bio!!}
      </div>
      <hr>
      <a href="/stars/{{$star->id}}/edit" class="btn btn-primary">Edit</a>
@endsection