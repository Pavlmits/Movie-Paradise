@extends('layouts.app')

@section('content')

@foreach($movies as $movie)
<ul class="collection with-header">
    <li class="collection-header"><h4>Favourite Movies</h4></li>
    <li class="collection-item"><div>{{$movie->name}<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
</ul>
@endforeach


@endsection