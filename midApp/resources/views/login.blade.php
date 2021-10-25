@extends('base')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <h1 class="text-light">Cheap Talk</h1>
    <form class="d-flex">
      <ul class="navbar-nav">
        <a class="btn btn-outline-light ms-2" href="{{ url('/login') }}">Login</a>
        <a class="btn btn-outline-light ms-2" href="{{ url('/register') }}">Register</a>
      </ul>
    </form>
  </div>
</nav>

<div class="row">
  <div class="col-md-4 offset-md-4">
    <div class="card bg-info mt-5">
      <div class="card-header bg-primary text-white text-center">
        <h3 class="card-title">User Login</h3>
      </div>
      <div class="card-body">
        <form action="{{url('/login')}}" method="post">
          {{ csrf_field() }}
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <button class="btn btn-primary form-control" type="submit">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection