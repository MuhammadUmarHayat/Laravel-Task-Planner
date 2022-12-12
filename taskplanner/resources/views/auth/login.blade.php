@extends('auth.layouts.master')
@section('title','Login')
@section('content')

                <div class="">
                   @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                     </div>
                   @endif
                  @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
        @endif
</div>
<div class="">
    <h2>Login</h2>
    <form  method="post" action={{route('login-user')}}>
      @csrf
     <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        <span class="text-danger">@error('email'){{$message}} @enderror </span>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        <span class="text-danger">@error('password'){{$message}} @enderror </span>
      </div>
       <button type="submit" class="btn btn-success">Submit</button>
    </form>
  </div>

  @endsection
