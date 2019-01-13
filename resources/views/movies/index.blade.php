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
    <div class="row">
			@foreach($movies as $movie)
        <div class="col s12 m6">
          <div class="card" >
          <div class="card-image">
				    <img  src="{{$movie->photo }}" alt="Card image cap">
              			<p class="card-content">{{ $movie->plot }} </p>
                </div>
            		<div class="card-footer">
                  <a href="#" class="btn btn-primary" style="float: center;">Find Out More!</a>
                  @if (!Auth::guest() && Auth::user()->hasRole('User'))
                   @if($movie->saveUser(Auth::user()))
                   <a  href="/deletemovie/{{Auth::user()->getId()}}/{{$movie->id}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">&#128148</i></a>
                   @else
                   <a  href="/savemovie/{{Auth::user()->getId()}}/{{$movie->id}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">♥</i></a>
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