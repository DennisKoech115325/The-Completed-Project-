@extends('layouts.app')
@section('content')
    <h1>Edit User Profile</h1>
    <div class="container">
        {!! Form::open(['action'=> ['UsersController@update', $users->id], 'method'=>'POST', 'enctype'=>'multipart/form-data','files'=>'true']) !!}
            <div class="from-group row">
                {{Form::label('name','Name',['class'=>'col-md-4 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::text('name',$users->name,['class'=>'form-control','placeholder'=>'Title'])}}
                </div>
            </div>
            <br>
            
            <div class="from-group row">
                {{Form::label('email','Email',['class'=>'col-md-4 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::text('email',$users->email,['class'=>'form-control','placeholder'=>'Body'])}}
                
                </div>
            </div>
            <br>
            
            <div class="from-group row">
                {{Form::label('about','About Me',['class'=>'col-md-4 col-form-label text-md-right'])}}
                <div class="col-md-4">
                    {{Form::textarea('about','Tell us about yourself',['class'=>'form-control','placeholder'=>'Body'])}}
                
                </div>
            </div>
             <br>
             <div class="row justify-content-center">
            <div class="form-group row">
                <div class="col-md-4">
                {{Form::file('user_img',['class'=>'col-md-4 col-form-label text-md-right'])}}
                </div>
            </div>
            <div class="form-group row">
            {{Form::hidden('_method','PUT')}}
            <br>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
@endsection