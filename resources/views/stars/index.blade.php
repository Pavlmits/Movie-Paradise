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
  <h1>Actors</h1>
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
<a href="/stars/create" class="btn btn-primary">Insert</a>
@endsection