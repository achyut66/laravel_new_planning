<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>@yield('title', 'अनुगमन समिति विवरण')</title>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/styles.css', 'resources/js/addmore.js'])
    <style>
        .sidebar {
            width: 235px;
            background-color: #f8f9fa;
            padding: 0;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
            bottom: 0;
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .content {
            margin-left: 220px;
            /* Adjust based on sidebar width */
            padding: 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 15px;
            margin: 0;
        }

        .sidebar-menu li {
            margin: 10px 0;
        }

        .sidebar-menu a {
            display: block;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Sidebar -->
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li><img src="{{ asset('images/logo.png')}}" alt="MyImage"
                        style="width:100px;height:100px;margin-left:35px;"></li>
                <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> ड्यासबोर्ड</a></li>
                <li><a href="{{ route('yojanaupload.index')}}"><i class="fa fa-file-excel"></i> Excel Upload
                        गर्नुहोस</a>
                </li>
                <li><a href="{{ route('yojanaupload.showallprogram')}}"><i class="fa fa-calendar"></i> योजना कार्यक्रम
                        हेर्नुहोस</a>
                </li>
                <!-- <li><a href="{{ route('ward_anugamans.index') }}"><i class="fas fa-user"></i> वडा स्तरीय अ. समिति</a>
                </li>
                <li><a href="{{ route('nagar_anugamans.index') }}"><i class="fas fa-user"></i> नगर स्तरीय अ. समिति</a>
                </li> -->
                <!-- Add more items here -->
            </ul>
        </div>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>

</html>