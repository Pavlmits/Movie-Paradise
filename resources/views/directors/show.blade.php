@extends('layout')

@section('content')
      <a href="/directors" class="btn btn-default">Go Back</a>
      <h1>{{$director->name}}</h1>
      <div>
            {!!$director->bio!!}
      </div>
      <hr>
      <a href="/directors/{{$director->id}}/edit" class="btn btn-primary">Edit</a>
@endsection