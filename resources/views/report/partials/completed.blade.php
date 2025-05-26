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
            <h1 class="mb-0">Completed Tasks</h1>
        </div>

        <div class="container-fluid">
        <table class="table table-bordered p-3 table-hover display" id="myTable">
            <thead>
                <tr class="text-center table-dark">
                    <th>Task ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Completed On</th>
                    <th>Assigned To</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td>{{ $task->task_id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td>{{ $task->employee->name ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No completed tasks found.</td>
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