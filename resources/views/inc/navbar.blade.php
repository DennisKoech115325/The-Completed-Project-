{{--     <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">{{config('app.name','Madripor')}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{route('login')}}">Login</a>
      </li>
      
      
  
        
    </ul>
    <ul class="nav navbar-nav navbar-light navbar-right">
        
    </ul>
    {{-- <form class="form-inline mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}
  {{--</div>
</nav>
{{-- class="nav-link disabled" can be used to prevent access to a link, Inakua uncliackable --}}

<nav class="navbar navbar-expand-md navbar-inverse bg-dark shadow-sm">
  <div class="container">
      <a class="navbar-brand text-white" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar=nav">
            
              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('posts.index')}}" tabindex="-1" aria-disabled="true">Blog</a>
              </li>
              
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link text-white" tabindex="-1" aria-disabled="true">Users</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('posts.create')}}" tabindex="-1" aria-disabled="true">Create Blog</a>
                  </li>
                  
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->username }}
                      </a>
                      {{-- This is the logout deets --}}
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @if(Auth::user()->usertype == 'admin')  
                          <a href="\dashboard" class="dropdown-item">Admin Dashboard</a>  
                          @endif
                          <a href="\users\{{Auth::user()->id}}" class="dropdown-item">Profile</a>
                          <a href="\home" class="dropdown-item">Dashboard</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
    
  </div>
</nav>