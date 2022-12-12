@extends('auth.layouts.main')
@section('title','Add Task')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          Add Task
        </h3>
      </div>
    <div class="card">
      <div class="card-body">
        <form class="forms-sample" action="{{ route('tasks.store') }}" method="post">
            @csrf

          <div class="form-group">
            <label for="exampleInputTask1">Task Title</label>
            <input type="text" name="task" value="{{ old('task') }}" class="form-control" id="exampleInputTask1" placeholder="Title of Task">
            @error('task')
            <span class="invalid_feedback">
              <strong class="text-danger text-sm">{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputDescription1">Description</label>
            <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="exampleInputDescription1" placeholder="Description">
            @error('description')
            <span class="invalid_feedback">
              <strong class="text-danger text-sm">{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputStatus1">Status</label>
            <input type="text" name="status" value="{{ old('status') }}" class="form-control" id="exampleInputStatus1" placeholder="status">
            @error('status')
            <span class="invalid_feedback">
              <strong class="text-danger text-sm">{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{ route('tasks.index') }}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
