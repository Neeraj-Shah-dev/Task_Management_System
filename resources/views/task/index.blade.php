<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>

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

    @section('title', 'Display Task')
    @section('content')

    <div class="d-flex justify-content-between align-items-center m-4">
        <h1 class="mb-0">Task</h1>
        <a href="task/create" class="btn btn-warning">Add New Task</a>
    </div>



    <div class="container-fluid">
        <table class="table table-bordered p-3 table-hover display" id="myTable">
            <thead>
                <tr class="text-center table-dark">
                    <th>ID</th>
                    <th>Task ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($task as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{ $task->task_id }}</td>
                        <td>{{$task->title}}</td>
                        <td>{{$task->description}}</td>
                        <td>{{$task->deadline}}</td>
                        <td>{{$task->assigned_to}}</td>
                        <td>{{$task->status}}</td>

                        <td>
                            <a href="{{ route('task.edit', ['task' => $task]) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('task.delete', ['task' => $task]) }}" method="get" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" value="delete" class="btn btn-danger">
                            </form>

                        </td>

                    </tr>
                @endforeach

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