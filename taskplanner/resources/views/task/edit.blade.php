@extends('auth.layouts.main')
@section('title','List of tasks')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          Edit Task
        </h3>
      </div>
    <div class="card">
      <div class="card-body">
        <form class="forms-sample" action="{{ route('tasks.update', $task->id) }}" method="post">
            @method('PUT')
            @csrf

          <div class="form-group">
            <label for="exampleInputTask1">Task title </label>
            <input type="text" name="task" value="{{ old('task',$task->task) }}" class="form-control" id="exampleInputTask1" placeholder="Task Title">
            @error('task')
            <span class="invalid_feedback">
              <strong class="text-danger text-sm">{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputDescription1">Description </label>
            <input type="text" name="description" value="{{ old('description',$task->description) }}" class="form-control" id="exampleInputDescription1" placeholder="Task description">
            @error('description')
            <span class="invalid_feedback">
              <strong class="text-danger text-sm">{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputStatus1">Status </label>
            <input type="text" name="status" value="{{ old('status',$task->status) }}" class="form-control" id="exampleInputexampleInputStatus1" placeholder="Task status">
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
