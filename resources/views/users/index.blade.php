@extends('layouts.app')
@section('content')
<h2>Users</h2>

@if(count($users) > 0)
        @foreach ($users as $item)
            <div class="card">
                <div class="row">
                    <div class="col-md2 col-sm-2">
                        <img style="width:100%" src="/storage/user_images/{{$item->user_img}}">
                    </div>
                    <div class="col_sm8 col-sm-8">
                        <h3><a href="/users/{{$item->id}}">{{$item->name}} </a></h3>
                        <small>Written on {{$item->created_at}}</small>   
                    </div>
            </div>
               
            </div>           
            <br> 
        @endforeach
        <br>
        <br>
        {{$users->links()}}
    @else   
        <p>No Users Found</p>
    @endif

@endsection