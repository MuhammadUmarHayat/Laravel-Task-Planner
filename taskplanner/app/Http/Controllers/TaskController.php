<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $email=session('email');
        $task=Task::all()->where('email',$email);
        return view('task.index',[
            'tasks'=>$task,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $name=session('name');
        $email=session('email');
        $request->validate([
            'task' => 'required',
            'description' => 'required',
            'status' => 'required',
              ]);
              $task=new Task();
              $task->name=$name;
              $task->email=$email;
              $task->task=$request->task;
              $task->description=$request->description;
              $task->status=$request->status;
              $task->save();

        if($task) {
            return to_route('tasks.index')->with(['success' => 'Task is added successfully.']);
        }

        return back()->with(['error' => 'Something went wrong.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        return view('task.edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'task' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $task->fill($data);
        $task->update();

        if($task) {
            return to_route('tasks.index')->with(['success' => 'Task is  updated successfully.']);
        }

        return back()->with(['error' => 'Something went wrong.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with(['success' => 'Task is deleted successfully.']);
    }
}
