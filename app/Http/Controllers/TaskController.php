<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    // 1:  Displaying all the Task
    public function index()
    {
        $task = Task::all();
        return view('task.index', ['task' => $task]);

    }

    // 2:  Assigning a new task
    public function create()
    {
        $employees = Employee::all();
        $statuses = ['Pending', 'In Progress', 'Completed'];

        return view('task.create', compact('employees', 'statuses'));
    }


    // 3:  Storing the task
    public function store(Request $request)
    {
        // dd($request); 

        // Firstly validating 
        $data = $request->validate([
            'task_id' => 'required|unique:tasks,task_id',
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date|after:today',
            'assigned_to' => 'required',
            'status' => 'required'
        ]);

        // Condition : One task per employee on same date
        $conflict = Task::where('assigned_to', $data['assigned_to'])
            ->whereDate('deadline', $data['deadline'])
            ->exists();

        if ($conflict) {
            return back()
                ->withErrors(['assigned_to' => 'This employee already has a task on the selected date.'])
                ->withInput();
        }

        $newTask = Task::create($data);

        return redirect()->route('task.index')->with('success', 'Task added successfully');
    }


    // 4:  Editing the task info
    public function edit(Task $task)
    {

        $employees = Employee::all();
        $statuses = ['Pending', 'In Progress', 'Completed'];

        return view('task.edit', compact('task', 'employees', 'statuses'));

    }


    // 5: Update
    public function update(Task $task, Request $request)
    {
        $data = $request->validate([
            'task_id'=>'required',
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date|after:today',
            'assigned_to'=>'required',
            'status' => 'required'
        ]);

        

        $task->update($data);

        return redirect()->route('task.index')->with('success', 'Task updated successfully');
    }

    // 6: Deleting 
    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Task Deleted successfully');
    }


}
