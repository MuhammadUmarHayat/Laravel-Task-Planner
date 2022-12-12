@extends('auth.layouts.main')
@section('title','Edit Task')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          Data table
        </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data table</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between ">
            <h4 class="card-title">Data table</h4>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg">+ Add New Company</a>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                      <th>ID#</th>
                      <th>Name</th>
                      <th>Task</th>
                      <th>Description</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                      <td>{{ $task->id }}</td>
                      <td>{{ $task->name }}</td>
                      <td>{{ $task->task }}</td>
                      <td>{{ $task->description }}</td>
                      <td>{{ $task->status }}</td>
                      <td>
                        <div class="row">
                          <a class="btn btn-outline-primary mx-2 p-2" href="{{ route('tasks.edit',$task->id) }}">Edit</a>
                          <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-outline-danger delete-company p-2">Delete</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
@endsection
