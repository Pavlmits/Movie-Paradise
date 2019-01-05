@extends('layout')

@section('content')
      <h1>Directors<h1>
      @if(count($directors) > 0)
        @foreach($directors as $director)
          <div> class="well">
            <h3>{{$director->name}}</h3>
            <small>Written on{{$director->created_at}}</small>
            </div>
        @endforeach
        {{$directors->links()}}
      @else
        <p>No directors found</p>
      @endif
@endsection