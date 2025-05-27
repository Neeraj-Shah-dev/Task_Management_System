<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>

  <!-- Bootstrap links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="bg-dark text-white p-3 vh-100" style="width: 20vw;">
    <h4 class="h2 mb-4"><a href="/" class="text-decoration-none">Dashboard</a></h4>
    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a href="{{ url('employee') }}" class="nav-link text-white">Employee</a>
      </li>
      <li class="nav-item mb-2">
        <a href="{{ url('task') }}" class="nav-link text-white">Task</a>
      </li>
      <li class="nav-item mb-2">
        <a href="{{ url('reports') }}" class="nav-link text-white">Report</a>
      </li>
    </ul>
  </div>

  <!-- Main content -->
  <div class="flex-grow-1 p-4">
    @yield('content')
  </div>
</div>

</body>
</html>
