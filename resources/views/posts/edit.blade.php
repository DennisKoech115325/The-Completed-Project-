@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1>Edit Posts Post</h1>
        {!! Form::open(['action'=> ['PostsController@update', $posts->id], 'method'=>'POST', 'enctype'=>'multipart/form-data','files'=>'true']) !!}
            <div class="from-group">
                {{Form::label('title','Title')}}
                {{Form::text('title',$posts->title,['class'=>'form-control','placeholder'=>'Title'])}}
            </div>
            <div class="from-group">
                {{Form::label('body','Body')}}
                {{Form::textarea('body',$posts->body,['class'=>'form-control','placeholder'=>'Body'])}}
            </div>
            <br>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::hidden('_method','PUT')}}
            <br>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>
@endsection