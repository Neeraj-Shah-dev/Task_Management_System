<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

     @extends('dashboard')

    @section('title', 'Edit Employee')
    @section('content')

    <h1 class="text-center mt-5">Edit Employees</h1>

 
   <form action="{{ route('employee.update', ['employee' => $employee]) }}" method="post" class="form border rounded border-secondary p-3 m-5">

        @csrf
        @method('put')

        <div class="form-group mt-3">
            <label for="name" class="form-label">Name:</label>
            @error('name')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}">
        </div>

        <div class="form-group mt-3">
            <label for="email" class="form-label">Email:</label>
            @error('email')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}">
        </div>

        <div class="form-group mt-3">
            <label for="designation" class="form-label">Designation:</label>
            @error('designation')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="text" name="designation" id="designation" class="form-control" value="{{ $employee->designation }}">
        </div>

        <div class="form-group mt-3">
            <label for="joining_date" class="form-label">Joining_date:</label>
            <input type="date" name="joining_date" id="joining_date" class="form-control" value="{{ $employee->joining_date }}">
        </div>

        <div class="form-group mt-5">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
        </div>
    </form>

    @endsection
</body>

</html>