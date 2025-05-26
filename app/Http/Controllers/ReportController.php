<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.report');
    }

    // overdue tasks
    public function overdueTasks()
    {
        $today = new DateTime();

        $tasks = Task::where('status', '!=', 'Completed')
            ->whereDate('deadline', '<', $today->format('Y-m-d'))
            ->with('employee')
            ->get();

         
    foreach ($tasks as $task) {
        $deadline = new DateTime($task->deadline);
        $interval = date_diff($deadline, $today);
        $task->overdue_days = $interval->days;
    }

        return view('report.partials.overdue', compact('tasks'));
    }

    // Completed tasks
    public function completedTasks()
    {
        $tasks = Task::where('status', 'Completed')->with('employee')->get();

        return view('report.partials.completed', compact('tasks'));
    }

    // Pending Tasks
    public function pendingTasks()
    {
        // $tasks = Task::where('status', 'Pending')->get();

        $tasks = Task::where('status', 'Pending')->with('employee')->get();

        return view('report.partials.pending', compact('tasks'));
    }

    // Employee Tasks
   public function employeeTasks()
{
    $employees = Employee::with('tasks')->get();
    return view('report.partials.employee_tasks', compact('employees'));
}


}

