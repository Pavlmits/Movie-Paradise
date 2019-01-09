
@extends('layout')

@section('content')
    <h1>Welcome</h1>

    <div class="row">
			@foreach($movies as $movie)
            <div class="col-lg-4 col-md-6 mb-4">
          		<div class="card">
            		<div style="width:300; height:200px; background:url('{{$movie->photo}}');" ><img class="card-img-top" alt=""></div>
            		<div class="card-body">
                          <h4 class="card-title">{{$movie->name}}</h4>
                          <p class="card-text">{{$movie->name}}</p>
              			<p class="card-text">{{ $movie->year }} </p>
            		</div>
            		<div class="card-footer">
              			<a href="#" class="btn btn-primary">Find Out More!</a>
            		</div>
          		</div>
            </div>
			@endforeach
          </div>
@endsection