<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">My Task Planner</a>
      </div>
      <ul class="nav navbar-nav">
        <li ><a href="{{url('dashboard')}}">Home</a></li>
        <li ><a href="{{route('tasks.index')}}">Task Management</a></li>
        <li><a href="{{url('logout')}}">logout</a></li>
       </ul>
    </div>
  </nav>
