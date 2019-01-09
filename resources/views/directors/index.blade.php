@extends('layout')

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
  <h1>Directors</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Director's Name</td>
          <td>Bio</td>
          <td>Photo</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($directors as $director)
        <tr>
            <td>{{$director->id}}</td>
            <td>{{$director->name}}</td>
            <td>{{$director->bio}}</td>
            <td>{{$director->photo}}</td>
            <td><a href="{{ route('directors.edit',$director->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('directors.destroy', $director->id)}}" method="post">
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
<a href="/directors/create" class="btn btn-primary">Insert</a>
@endsection