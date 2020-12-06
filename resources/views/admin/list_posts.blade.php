@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light-50 sidebar collapse">
          <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active text-dark" href="/list_users">
                  Users
                </a>
              </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/list_posts">
              Posts
            </a>
          </li>
        </ul>
      </div>
    </nav>
    </div>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         @if (count($posts)>0)
        <table class="table">
            <thead>
                <tr>
                    <th>Created:</th>
                    <th>Title:</th>
                    <th>Actions:</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($posts as $user)
                        <tr>
                            <td>{{$user->created_at}}</td>
                            <td><a href="/posts/{{$user->id}}">{{$user->title}}</a></td>
                            <td>
                              {!!Form::open(['action'=>['PostsController@destroy',$user->id],'method'=>'POST','class'=>'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                              {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        @else
            <div class="container-fluid">
                <p>No Posts</p>
            </div>
            @endif
        </div>
    </main>
</div>
@endsection