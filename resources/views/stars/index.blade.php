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
  <h1>Actors</h1>
  @if (!Auth::guest() && Auth::user()->hasRole('Admin'))
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Actor's Name</td>
          <td>Bio</td>
          <td>Photo</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($stars as $star)
        <tr>
            <td>{{$star->id}}</td>
            <td>{{$star->name}}</td>
            <td>{{$star->bio}}</td>
            <td>{{$star->photo}}</td>
            <td><a href="{{ route('stars.edit',$star->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('stars.destroy', $star->id)}}" method="post">
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

@else
<div class="row">
			@foreach($stars as $star)
            <div class="col-lg-4 col-md-6 mb-4">
				  <div class="card" style="width: 18rem;">
				  <img class="card-img" src="/storage/app/public/photo/{{$star->photo}}">
            		<div class="card-body">
                        <h4 class="card-title">{{$star->name}}</h4>
            		</div>
            		<div class="card-footer">
						  <a href="#" class="btn btn-primary" style="float: center;">Find Out More!</a>
						  <!-- <a href="#"  id="mylink" onclick="myFunction()" class="btn btn-primary" style="float: right;">Save</a> -->
						  <a href="#" class="btn btn-success btn-lg">
     						 <span class="glyphicon glyphicon-heart"></span> Save 
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
<a href="/stars/create" class="btn btn-primary">Insert</a>
@endsection