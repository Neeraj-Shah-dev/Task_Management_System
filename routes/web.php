<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// =============================================
// Dashboard
Route::get('/', function(){
    return view('dashboard');
});


// ===================================================================
// Displaying all employees route
Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index'); 

// Creating a new employee route
Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');

// Stroing the data
Route::post('/employee',[EmployeeController::class,'store'])->name('employee.store');

// Editing route
Route::get('/employee/{employee}/edit',[EmployeeController::class,'edit'])->name('employee.edit');

// Update routing
Route::put('/employee/{employee}/update',[EmployeeController::class,'update'])->name('employee.update');


// Delete route
Route::get('/employee/{employee}/delete',[EmployeeController::class,'delete'])->name('employee.delete');

// ===================================================================

Route::get('/task',[TaskController::class,'index'])->name('task.index'); 

Route::get('/task/create',[TaskController::class,'create'])->name('task.create');

Route::post('/task',[TaskController::class,'store'])->name('task.store');

// Editing route
Route::get('/task/{task}/edit',[TaskController::class,'edit'])->name('task.edit');

// Update routing
Route::put('/task/{task}/update',[TaskController::class,'update'])->name('task.update');


// Delete route
Route::get('/task/{task}/delete',[TaskController::class,'delete'])->name('task.delete');


// ===================================================================


Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::get('/reports/overdue', [ReportController::class, 'overdueTasks'])->name('reports.overdue');

Route::get('/reports/completed', [ReportController::class, 'completedTasks'])->name('reports.completed');

Route::get('/reports/pending', [ReportController::class, 'pendingTasks'])->name('reports.pending');

Route::get('/reports/employees', [ReportController::class, 'employeeTasks'])->name('reports.employees');

// ========================================================



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
