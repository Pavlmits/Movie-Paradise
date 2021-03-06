@extends('layouts.app')

@section('content')
  <h1>Edit Actor</h1>
    {!! Form::open(['action' => ['StarsController@update',$star->id],'method'=>'PUT', 'enctype' => 'multipart/form-data'])!!}
      <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name',$star->name,['class'=>'form-control','placeholder'=>'Name'])}}
          </div>
          <div class="form-group">
            {{Form::label('bio','Bio')}}
            {{Form::textarea('bio',$star->bio,['class'=>'form-control','placeholder'=>'Bio'])}}
          </div>
          <div class="form-group">
            {{Form::label('photo','Photo')}}
            {{Form::text('photo',$star->photo,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Photo'])}}
          </div>
          {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}

@endsection