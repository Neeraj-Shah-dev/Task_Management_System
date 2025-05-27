<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    
    {{-- Bootstrap Links --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

     @extends('dashboard')

    @section('title', 'Add Task')
    @section('content')

     <h1 class="text-center mt-5">Assign Task</h1>

     <form action="{{route('task.store')}}" method="post" class="form border rounded border-secondary p-3 m-5">

        @csrf

        <div class="form-group mt-3">
            <label for="task_id" class="form-label">Task ID:</label>
            @error('task_id')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="text" name="task_id" id="task_id" class="form-control"
             value="{{ $errors->has('task_id') ? '' : old('task_id') }}">
        </div>

        <div class="form-group mt-3">
            <label for="title" class="form-label">Title:</label>
            @error('title')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="text" name="title" id="title" class="form-control"
             value="{{ $errors->has('title') ? '' : old('title') }}">
        </div>

        <div class="form-group mt-3">
            <label for="description" class="form-label">Description:</label>
            @error('description')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="text" name="description" id="description" class="form-control"
             value="{{ $errors->has('description') ? '' : old('description') }}">
        </div>

        <div class="form-group mt-3">
            <label for="deadline" class="form-label">Deadline:</label>
            @error('deadline')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <input type="date" name="deadline" id="deadline" class="form-control"
             value="{{ $errors->has('deadline') ? '' : old('deadline') }}">
        </div>

        <div class="form-group mt-3">
            <label for="assigned_to" class="form-label">Assigned to:</label>
             @error('assigned_to')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <select name="assigned_to" id="assigned_to" class="form-select">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->employee_id }}">{{ $employee->name }}</option>
                    @endforeach
            </select>
        </div>

         <div class="form-group mt-3">
            <label for="status" class="form-label">Status:</label>
             @error('status')
                <small class="text-danger">* {{ $message }}</small>
            @enderror
            <select name="status" id="status" class="form-select">
                    @foreach($statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
            </select>
        </div>


        <div class="form-group mt-5">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Add a new Task">
        </div>
    </form>

    @endsection
</body>
</html>