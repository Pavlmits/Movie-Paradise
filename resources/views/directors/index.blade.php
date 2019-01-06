@extends('layout')

@section('content')
      <a href="/directors/create" class="btn btn-primary">Insert</a>
      <h1>Directors<h1>
      @if(count($directors) > 0)
        @foreach($directors as $director)
          <div class="well">
            <h3><a href="/directors/{{$director->id}}">{{$director->name}}</a></h3>
            <small>Written on {{$director->created_at}}</small>
            </div>
        @endforeach
        {{$directors->links()}}
      @else
        <p>No directors found</p>
      @endif
@endsection