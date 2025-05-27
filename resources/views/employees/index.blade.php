<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>

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

    @section('title', 'Employee List')
    @section('content')

        <div class="d-flex justify-content-between align-items-center m-4">
            <h1 class="mb-0">Employees</h1>
            <a href="employee/create" class="btn btn-warning">Add New Employee</a>
        </div>



        <div class="container-fluid">
            <table class="table table-bordered p-3 table-hover display" id="myTable">
                <thead>
                    <tr class="text-center table-dark">
                        <th>ID</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Designation</th>
                        <th>Joining Date</th>
                        <th class="no-sort">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->designation}}</td>
                            <td>{{$employee->joining_date}}</td>

                            <td>
                                <a href="{{ route('employee.edit', ['employee' => $employee]) }}"
                                    class="btn btn-primary">Edit</a>

                                <form action="{{ route('employee.delete', ['employee' => $employee]) }}" method="get"
                                    class="d-inline" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>


        <script>
            // Datatables
            $(document).ready(function () {
                $('#myTable').DataTable({
                     "columnDefs": [
            {
                "orderable": false,
                "targets": 'no-sort'
            }
        ]
                });
            });

            // Javascript
             function confirmDelete() {
        return confirm("Are you sure you want to remove this employee?");
    }

        </script>

    @endsection

</body>

</html>