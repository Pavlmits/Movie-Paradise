@extends('layouts.app')

@section('content')
  <h1>Edit Director</h1>
    {!! Form::open(['action' => ['DirectorsController@update',$director->id],'method'=>'Post'])!!}
      <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name',$director->name,['class'=>'form-control','placeholder'=>'Name'])}}
          </div>
          <div class="form-group">
            {{Form::label('bio','Bio')}}
            {{Form::textarea('bio',$director->bio,['class'=>'form-control','placeholder'=>'Bio'])}}
          </div>
          <div class="form-group">
            {{Form::label('photo','Photo')}}
            {{Form::text('photo',$director->photo,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Photo'])}}
          </div>
          {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}

@endsection