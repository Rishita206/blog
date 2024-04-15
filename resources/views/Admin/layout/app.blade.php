<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">BLOG</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          
          
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url ('http://127.0.0.1:8000/')}}">Home</a>
              </li>
             
             
             
              <li class="nav-item">
                <a class="nav-link" href="{{route ('post.user')}}">Posts</a>
              </li>
             
             
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{route ('category.index')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                @php
                $categories = App\Models\Category::all(); // Assuming you have a Category model
                @endphp

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                   @foreach($categories as $category)
                  <li><a class="dropdown-item" href="{{route('post.view')}}/{{$category->id}}" target="">{{$category->categoryname}}</a></li>
                  @endforeach 
                </ul>
              </li>

            
            
              @if(Auth::user())

              {{-- <li class="nav-item">
                <a class="nav-link drop-down toggle" href="{{route('login')}}" role="button" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                  
                </ul>
              </li> --}}

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{route ( 'login' )}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth::user()->name}}
                </a>
               
               
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route ('logout')}}">Logout</a></li>
                 
                </ul>
              </li>
@else
             



<li class="nav-item">
                <a class="nav-link" href="{{route ( 'login' )}}">Login</a>
                
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route ('register')}}">Register</a>
              </li>
              
     @endif           
            </ul>

           
                  
              </li>
            
          </div>
        </div>
      </nav>

    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>