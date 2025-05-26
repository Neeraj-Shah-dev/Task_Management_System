<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Employee extends Model
{
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'designation',
        'joining_date'
    ];

    
public function tasks()
{
    return $this->hasMany(Task::class, 'assigned_to', 'employee_id');
}



}
