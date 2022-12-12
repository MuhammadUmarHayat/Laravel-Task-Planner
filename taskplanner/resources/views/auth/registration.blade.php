@extends('auth.layouts.master')
@section('title','Login')
@section('content')

<div class="">
    <h2>Register Now!</h2>
    <form  method="post" action={{route('register-user')}}>
      @csrf
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        <span class="text-danger">@error('name'){{$message}} @enderror </span> </div>
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
