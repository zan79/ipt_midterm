@extends('base')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <h1 class="text-light">Cheap Talk</h1>
      <div class="d-flex fw-bold" id="navbarNavDropdown">
        <ul class="navbar-nav">
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

<div class="card col-md-6 mx-auto my-5">
    <div class="card-body bg-info pb-2">

      <form action="{{url('/newpost')}}" method="post">
        {{csrf_field()}}
        <div class="float-end">
            <select name="category_id" id="category_id" class="form-select">
              @foreach(App\Models\Category::all() as $category)
              <option value="{{$category->id}}">{{$category->category}}</option>
              @endforeach
            </select>
          </div>
          <h5 class="float-end mt-2">Category</h5>

        <h3>Create Post</h3>

        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="mb-2">
          <textarea name="post" id="post" cols="30" rows="6" class="form-control bs"></textarea>
        </div>
        <div class="mb-2">
            <button class="btn btn-primary form-control" type="submit">Post</button>
        </div>

      </form>

    </div>
  </div>

@endsection