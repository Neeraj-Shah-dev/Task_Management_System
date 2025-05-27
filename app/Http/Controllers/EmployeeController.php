<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // 1:  Displaying all the employees
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);

    }

    // 2:  Creating a new employee
    public function create()
    {
        return view('employees.create');
    }


    // 3:  Now storing and inserting a record
    public function store(Request $request)
    {
        // dd($request); 

        // Firstly validating 
        $data = $request->validate([
            'employee_id'=>'required|unique:employees,employee_id',
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'designation' => 'required',
            'joining_date' => 'required|date|before:today'
        ]);

        $newEmployee = Employee::create($data);

        return redirect()->route('employee.index')->with('success', 'Employee added successfully');
    }


    // 4:  Editing the employee info
    public function edit(Employee $employee)
    {
        // dd($employee);

        return view('employees.edit', ['employee' => $employee]);

    }


    // 5:  Updating the employee
    // here we have passed employee and request as para , as we ewill fetch employee id and updated info as well
    public function update(Employee $employee, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'designation' => 'required',
            'joining_date' => 'required|date|before:today'
        ]);

        $employee->update($data);

         return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }

    // 6: Deleting the employee
    public function delete(Employee $employee){
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee Deleted successfully');
    }


}
