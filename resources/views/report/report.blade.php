<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        #button {
            box-sizing: border-box;
            padding: 50px 100px;
            border-radius: 10px;
            margin-left: 10px;
            font-size: 20px;
        }

        .count{
            font-size: 30px;
            color: white;
            padding: 20px 40px;
            margin-right:40px;
            border:2px solid grey;
        }
    </style>

</head>

<body>

    @extends('dashboard')

    @section('title', 'Reports')

    @section('content')
        <div class="mt-4">
            <h2>Report Lists</h2>
        </div>

        <div>

            {{-- First block --}}
            <div class="d-flex justify-content-start align-items-center m-4">
                {{-- link 1 --}}

                <a href="{{ route('reports.overdue') }}" class="text-decoration-none">
                   
                    <div class="text-bg-primary d-flex justify-content-center align-items-center" id="button">
                         <div class="count">{{$overdueCount }}</div>
                         <p>Overdue Tasks</p>
                    </div>
                </a>


                {{-- link 2 --}}

                <a href="{{ route('reports.completed') }}" class="text-decoration-none">
                    <div class="text-bg-warning d-flex justify-content-center align-items-center" id="button">
                        <div class="count">{{$completedCount }}</div>    
                        <p>Completed Tasks</p>
                    </div>
                </a>


            </div>

            {{-- Seconda block --}}
            <div class="d-flex justify-content-start align-items-center m-4">

                {{-- link 3 --}}

                <a href="{{ route('reports.pending') }}" class="text-decoration-none">
                    <div class="text-bg-danger d-flex justify-content-center align-items-center" id="button">
                        <div class="count">{{$pendingCount }}</div>
                        <p>Pending Tasks</p>
                    </div>
                </a>


                {{-- link 4 --}}
                
                    <a href="{{ route('reports.employees') }}" class="text-decoration-none">
                    <div class="text-bg-success  d-flex justify-content-between align-items-center" id="button">   
                        <div class="count">{{$employeeTaskCount }}</div>
                        <p>Tasks Per Employee</p>
                     </div>
                    </a>
               

            </div>

        </div>


    @endsection

</body>

</html>