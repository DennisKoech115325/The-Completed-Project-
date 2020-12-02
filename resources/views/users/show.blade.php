@extends('layouts.app')
@section('content')
<h2>{{$users->username}}'s Profile</h2>
<div class="container-fluid" style="margin-left:20px">
    <div class="container-fluid">
         @if(!Auth::guest())
            @if(Auth::user()->id==$users->id)
                <a href="/users/{{$users->id}}/edit" class="btn btn-outline-primary" style="height:100%">Edit</a>
                <br>
                <br>
                
            @endif
        @endif
    </div>
</div>
<div class="container">
        <div class="row rm-3">
            <br>
            <div class="col-sm-2">

                    <img class="img-rounded" src="/storage/user_images/{{$users->user_img}}" alt="Image Not Found" style="width: 100%">
                
            </div>
            <div class="col-sm-3">
                <div class="bg-transparent">
                    <h4>Name:</h4>
                    <p>{{$users->name}}</p>
                    <br>
                    <h4>Email:</h4>
                    <p>{{$users->email}}</p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="bg-transparent">
                    <h4>Username:</h4>
                    <p>{{$users->username}}</p>
                    <br>
                    <h4>Joined on:</h4>
                    <p>{{$users->created_at}}</p>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin: 25px 0">
            <h3>About me</h3>

            <div class="col-10">
                <p>{{$users->about}}</p>
            </div>
        </div>
        <div class="container-fluid">
            <h3>Checkout My Posts</h3>
            <br>
            @if(count($posts)>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Created At:</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $item)
                        <tbody>
                            <tr>
                            <td scope="row"><a href="/posts/{{$item->id}}">{{$item->title}}</a></td>
                            <td scope="row">{{$item->created_at}}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <p>No posts</p>
            @endif
        </div>
        
</div>
@endsection