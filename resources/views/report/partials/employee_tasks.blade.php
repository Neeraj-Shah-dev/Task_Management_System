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
            <h1 class="mb-0">All Task with Employee Information</h1>
        </div>

        <div class="container-fluid">
            <table class="table table-bordered p-3 table-hover display" id="myTable">
                <thead>
                    <tr class="text-center table-dark">
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Task</th>
                        <th>Deadline</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        @if($employee->tasks->isNotEmpty())
                            @foreach($employee->tasks as $task)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->designation }}</td>
                                    <td>{{ $task->task_id }}</td>
                                    <td>{{ $task->deadline }}</td>
                                    <td>{{ $task->status }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->designation }}</td>
                                <td class="text-center" colspan="3">No tasks assigned</td>
                            </tr>
                        @endif

                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No employees found.</td>
                        </tr>
                    @endforelse

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