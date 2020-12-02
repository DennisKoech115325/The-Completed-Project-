@extends('layouts.app')
@section('content')
    <h1>Create Post</h1>
        {!! Form::open(['action'=> 'PostsController@store', 'method'=>'POST', 'enctype'=>'mulitpart/form-data', 'files'=>'true']) !!}
            <div class="from-group">
                {{Form::label('title','Title')}}
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
            </div>
            <div class="from-group">
                {{Form::label('body','Body')}}
                {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Body'])}}
            </div>
            <div class="form-group">
                {{Form::hidden('user_id')}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection