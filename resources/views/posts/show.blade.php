@extends('layouts.app')
    @section('content')
    <div class="container-fluid">
    <h1>{{$posts->title}}</h1>

                <img style="width:100%" src="/storage/cover_images/{{$posts->cover_image}}">

        <div class="jumbotron text-lg-left">
                {{$posts->body}}
       <br>
       <hr>
        <span>Written on {{$posts->created_at}}</span>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id==$posts->user_id || Auth::user()->usertype == 'admin')
                    @if(Auth::user()->id==$posts->user_id)        
                        <a href="/posts/{{$posts->id}}/edit" class="btn btn-outline-primary">Edit</a>
                    @endif
                        <br>
                <br>
                {!!Form::open(['action'=>['PostsController@destroy',$posts->id],'method'=>'POST','class'=>'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
        @endif
    </div>
    </div>
@endsection