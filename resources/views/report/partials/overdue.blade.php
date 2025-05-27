<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    {{-- Bootstrap links --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Jquery links --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Datatables link --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>

</head>
<body>

    @extends('dashboard')

@section('title', 'Reports')

@section('content')


<div class="m-4">
        <h1 class="mb-0">Overdue Task</h1>
    </div>

<div class="container-fluid">

<table class="table table-bordered" id="myTable">
    <thead>
        <tr class="text-center table-dark">
            <th>Task Title</th>
            <th>Deadline</th>
            <th>Overdue By</th>
            <th>Assigned To</th>
            <th>Status</th>
        </tr>
    </thead>
    {{-- <tbody>
        @forelse($tasks as $task)
        <tr>
            <td>{{ $task->task_id }}</td>
            <td>{{ $task->deadline }}</td>
            <td>{{ $task->overdue_days }} days</td>
            <td>{{ $task->employee->name ?? 'N/A' }}</td>
            <td>{{ $task->status }}</td>
        </tr>
        @empty
        <tr>
            <td>No overdue tasks</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforelse
    </tbody> --}}

    <tbody>
        @if($tasks->isNotEmpty())
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->task_id }}</td>
            <td>{{ $task->deadline }}</td>
            <td>{{ $task->overdue_days }} days</td>
            <td>{{ $task->employee->name ?? 'N/A' }}</td>
            <td>{{ $task->status }}</td>
        </tr>
        @endforeach
        @else
                <tr>
                    <td>No Overdue</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
        @endif


    </tbody>
</table>
</div>

      <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

@endsection
</body>
</html>