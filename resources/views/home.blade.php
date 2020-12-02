@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <a href="/posts/create" class="btn btn-primary">Create Posts</a>
                    <hr>
                    <h3>Your Posts</h3>
                    <hr>
                    @if(count($posts) > 0)
                        <table>
                            <tr>
                                <th style="margin: 0px 10px">Title:</th>
                                <th colspan="2">Actions:</th>
                            </tr>
                            @foreach ($posts as $post)

                                <tr>
                                    <td>{{$post->title}}</td>

                                    <td><a href="posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                     {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                                     {{Form::hidden('_method','DELETE')}}
                                     {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                     {!!Form::close()!!}
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    @else
                        <h4>You Have No Posts</h4>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
