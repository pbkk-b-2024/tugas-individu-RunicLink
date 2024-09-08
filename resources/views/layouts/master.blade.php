<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rune Dashboard')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .wrapper {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 150px;
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
        }
        .sidebar a {
            color: #fff;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            margin-top: auto; 
        }
        .custom-header .container-fluid {
            display: flex;
            justify-content: flex-start;
            width: 100%;
        }
        .custom-header .h4 {
            margin-left: 500px; /* Sesuaikan dengan lebar sidebar */
        }
    </style>
</head>
<body>
    <!-- Header -->
    @include('components.header')

    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
