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

<div class="col-md-8 mx-auto">
  <h3 class="pt-3 text-center text-light">Users</h3>
  <hr>
  @foreach($users as $user)
  @if ($user->gender == 'Male')
  <div class="card my-3" style="background-color: lightblue">
  @else
  <div class="card my-3" style="background-color: lightpink">
  @endif
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <span class="dot mt-1 ms-1"></span>
        </div>
        <div class="col">
          <h1 class="card-title">{{$user->name}}</h1>
          <a class="btn btn-lg btn-warning form-control" href="/user/{{$user->id}}">Show Posts</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
</div>
    
@endsection

