@extends('layouts.app')

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
  @if (!Auth::guest() && Auth::user()->hasRole('Admin'))
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Photo</td>
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
            <td><img style="width:20%" src="/storage/photo/{{$movie->photo}}"></td>
            <td>{{$movie->id}}</td>
            <td>{{$movie->title}}</td>
            <td>{{$movie->duration}}</td>
            <td>{{$movie->year}}</td>
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
<a href="/movies/create" class="btn btn-primary">Insert</a>
@else
<div class="container">
    <div class="row justify-content-center">
			@foreach($movies as $movie)
            <div class="col-md-4">
				  <div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="/storage/app/public/photo/{{$movie->photo}}" alt="Card image cap">
            		<div class="card-body">
                    <h4 class="card-title">{{$movie->name}}</h4>
              			<p class="card-text">{{ $movie->year }} </p>
                </div>
            		<div class="card-footer">
                  <a href="#" class="btn btn-primary" style="float: center;">Find Out More!</a>
                  @if (!Auth::guest() && Auth::user()->hasRole('User'))
                   @if($movie->hasUser(Auth::user()))
                     <a href="/savemovie/{{Auth::user()->getId()}}/{{$movie->id}}" class="btn btn-success btn-lg">
                     <span class="glyphicon glyphicon-heart"> Unsave </span>
                   @else
						       <a href="/savemovie/{{Auth::user()->getId()}}/{{$movie->id}}" class="btn btn-success btn-lg">
                  <span class="glyphicon glyphicon-heart"> Save </span>
                  @endif
                  @endif
    					</a>
            		</div>
          		</div>
			</div>
			<script>
				function myFunction() {
 				 document.getElementById("mylink").innerHTML = "Saved";
				}
			</script>
			@endforeach
          </div>
          @endif
@endsection