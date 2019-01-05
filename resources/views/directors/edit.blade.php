@extends('layout')

@section('content')
  <h1>Edit Director</h1>
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
      <form method="post" action="{{ route('directors.update', $director->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Director's Name:</label>
          <input type="text" class="form-control" name="director_name" value={{ $director->director_name }} />
        </div>
        <div class="form-group">
          <label for="bio">Bio :</label>
          <input type="text" class="form-control" name="director_bio" value={{ $director->director_bio }} />
        </div>
        <div class="form-group">
          <label for="photo">Photo:</label>
          <input type="text" class="form-control" name="director_photo" value={{ $director->director_photo }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection