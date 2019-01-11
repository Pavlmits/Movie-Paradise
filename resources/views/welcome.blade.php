
@extends('layouts.app')

@section('content')
    <h1>Welcome</h1>

	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://pmcdeadline2.files.wordpress.com/2014/06/directorchair1.jpg?crop=0px%2C25px%2C719px%2C482px&resize=446%2C299" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://us.123rf.com/450wm/shadowstudio/shadowstudio1311/shadowstudio131100003/23767082-young-actor.jpg?ver=6" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://boygeniusreport.files.wordpress.com/2016/03/movies-tiles.jpg?quality=98&strip=all" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection