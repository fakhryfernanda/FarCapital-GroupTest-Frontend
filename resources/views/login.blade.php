@extends('layouts.templates')

@section('title','Login Admin')

@section('login')

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
      
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login Admin</h5>
            
        {{-- kondisi ketika admin salah menginput password --}}
            @if (session()->has('loginError'))
            <div class="bg-warning ">
                <p class="text-dark text-center">{{ session('loginError') }}</p>
            </div>
          @endif
            <form action="" method="post">
                @csrf
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>
                  
         
        
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection