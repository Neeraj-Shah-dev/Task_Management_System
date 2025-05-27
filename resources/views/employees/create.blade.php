<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>

    {{-- Bootstrap Links --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    @extends('dashboard')

    @section('title', 'Add Employee')
    @section('content')

    <h1 class="text-center mt-5">Add Employee</h1>

    <form action="{{route('employee.store')}}" method="post" class="form border rounded border-secondary p-3 m-5">

        @csrf

        <div class="form-group mt-3">
            <label for="employee_id" class="form-label">Employee ID:</label>
            @error('employee_id')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="text" name="employee_id" id="employee_id" class="form-control"  
            value="{{ $errors->has('employee_id') ? '' : old('employee_id') }}">
        </div>

        <div class="form-group mt-3">
            <label for="name" class="form-label">Name:</label>
            @error('name')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="text" name="name" id="name" class="form-control"
            value="{{ $errors->has('name') ? '' : old('name') }}">
        </div>

        <div class="form-group mt-3">
            <label for="email" class="form-label">Email:</label>
            @error('email')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="email" name="email" id="email" class="form-control"
            value="{{ $errors->has('email') ? '' : old('email') }}">
        </div>

        <div class="form-group mt-3">
            <label for="designation" class="form-label">Designation:</label>
            @error('designation')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="text" name="designation" id="designation" class="form-control"
             value="{{ $errors->has('designation') ? '' : old('designation') }}">
        </div>

        <div class="form-group mt-3">
            <label for="joining_date" class="form-label">Joining Date:</label>
            @error('joining_date')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="date" name="joining_date" id="joining_date" class="form-control"
             value="{{ $errors->has('joining_date') ? '' : old('joining_date') }}">
        </div>

        <div class="form-group mt-5">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Add a new employee">
        </div>
    </form>

    @endsection
</body>

</html>