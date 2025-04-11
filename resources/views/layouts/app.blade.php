<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- CSS langsung di dalam file -->
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
        }
        .sidebar {
            width: 200px;
            height: 800px;
            background-color: #6f42c1;
            padding: 15px;
            color: white;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            margin: 20px;
            flex-shrink: 0;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white">Dashboard</h4>
        <div class="list-group mt-3">
            <button class="list-group-item list-group-item-action"> <i class="fas fa-user"></i> Jose</button>
            <button class="list-group-item list-group-item-action"> <i class="fas fa-user"></i> Feodore</button>
        </div>
        <button class="btn btn-light w-100 mt-4">+</button>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
