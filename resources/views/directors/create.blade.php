@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Director
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    {!! Form::open(['action' => 'DirectorsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <form method="post" action="{{ route('directors.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name= "name" value="{{ old('name') }}"/>
          </div>
          <div class="form-group">
              <label for="bio">Bio :</label>
              <input type="textarea" class="form-control" name="bio" value="{{ old('bio') }}" />
          </div>
          
          <div class="form-group" >
          <label for="name">Photo:</label>
              <input type="text" class="form-control" name= "photo" value="{{ old('photo') }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
      {!! Form::close() !!}
  </div>
</div>
@endsection