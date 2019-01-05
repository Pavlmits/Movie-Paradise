@extends('layout')

@section('content')
      <h1>Insert Director<h1>
      {!! Form::open(['action' => 'DirectorsController@store','method'=>'POST']) !!}
          <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
          </div>
          <div class="form-group">
            {{Form::label('bio','Bio')}}
            {{Form::textarea('bio','',['class'=>'form-control','placeholder'=>'Bio'])}}
          </div>
          <div class="form-group">
            {{Form::label('photo','Photo')}}
            {{Form::text('photo','',['class'=>'form-control','placeholder'=>'Photo'])}}
          </div>
          {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
@endsection