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
<div class="text-center">
  <h2>Welcome to The Administrator Dashboard</h2>
</div>
</div>
@endsection