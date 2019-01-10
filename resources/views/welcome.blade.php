
@extends('layouts.app')

@section('content')
    <h1>Welcome</h1>

    <div class="row">
			@foreach($movies as $movie)
            <div class="col-lg-4 col-md-6 mb-4">
				  <div class="card" style="width: 18rem;">
				  <img class="card-img" src="/storage/app/public/photo/{{$movie->photo}}">
            		<!-- <div style="width:300; height:200px; background:url('{{$movie->photo}}');" ><img class="card-img-top" alt=""></div> -->
            		<div class="card-body">
                        <h4 class="card-title">{{$movie->name}}</h4>
              			<p class="card-text">{{ $movie->year }} </p>
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
@endsection