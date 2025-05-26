<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;


class Task extends Model
{
    protected $fillable = [
        'task_id',
        'title',
        'description',
        'deadline',
        'assigned_to',
        'status'
    ];

  public function employee()
{
    return $this->belongsTo(Employee::class, 'assigned_to', 'employee_id');
}


}
