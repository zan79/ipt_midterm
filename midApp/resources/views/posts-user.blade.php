@extends('base')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <h1 class="text-light">Cheap Talk</h1>
    <div class="d-flex fw-bold" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="mx-3 fw-bold btn btn-outline-light" href="/newpost">Create Post</a>
      </li>

          <li class="nav-item">
              <a class="nav-link active" href="/dashboard">Home</a>
          </li>
          <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle  text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  @foreach(App\Models\Category::all() as $category)
                  <li><a class="dropdown-item" href="/categories/{{$category->id}}">{{$category->category}}</a></li>
                  @endforeach
              </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/users">Users</a>
        </li>
          <li class="nav-item ms-5">
              <a class="btn btn-danger" href="{{ url('/login') }}">Logout</a>
          </li>
      </ul>
  </div>
  </div>
</nav>

<div class="row">
  <div class="col-md-8 mx-auto">
  <h1 class="card-title ms-3 text-light text-center">{{$user->name}}'s Posts</h1>
  <hr>
  @foreach($posts as $post)
  @if ($post->user->gender == 'Male')
  <div class="card my-3 bs br" style="background-color: lightblue">
    @else
    <div class="card my-3 bs br" style="background-color: lightpink">
      @endif
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-2">
            <span class="dot mt-1 ms-1"></span>
          </div>
          <div class="col">
            <div class="dropdown float-end">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{$post->category->category}}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach(App\Models\User::whereHas('posts', function($query) use ($post){
                $query->where('category_id', $post->category_id);
                })->get() as $user)
                <li>
                  <a class="dropdown-item" href="/user/{{$user->id}}">{{$user->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
    
            <h4 class="card-title ms-3">{{$post->user->name}}</h4>
            <hr>
            <p class="card-text pb-3 px-3">{{$post->post}}</p>
          </div>
        </div>

      </div>
    </div>
    @endforeach
    
  </div>
</div>
    
@endsection

