@extends('layouts.app')
@section('content')
<div class="container-fluid">
<h2>Posts</h2>
    @if(count($posts) > 0)
        @foreach ($posts as $item)
            <div class="card">
                <div class="row">
                    <div class="col-md4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}">
                    </div>
                    <div class="col_sm8 col-sm-8">
                        <h3><a href="/posts/{{$item->id}}">{{$item->title}} </a></h3>
                        <small>Written on {{$item->created_at}}</small>   
                    </div>
            </div>
               
            </div>           
            <br> 
        @endforeach
        <br>
        <br>
        {{$posts->links()}}
    @else   
        <p>No posts Found</p>
    @endif
</div>
@endsection