@extends('layouts.app')
@section('content')
<h2>Users</h2>

@if(count($users) > 0)
        @foreach ($users as $item)
            <div class="card">
                <div class="row">
                    
                    <div class="col_sm8 col-sm-8">
                        <h3><a href="/users/{{$item->id}}">{{$item->name}} </a></h3>
                        <p>{{$item->username}}</p>
                        <small>Joined on: {{$item->created_at}}</small>   
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