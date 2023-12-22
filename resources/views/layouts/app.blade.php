<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Library Management System') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }} "> <!-- Custom stlylesheet -->

</head>

<body class="sb-nav-fixed">
    <!-- HEADER -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success justify-content-center">
        <div class="nav-item">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="nav-item">
            <a class="navbar-brand ps-3" href="{{ route('books') }}">Books</a>
        </div>
        <div class="nav-item">
            <a class="navbar-brand ps-3" href="{{ route('authors') }}">Authors</a>
        </div>
        <div class="nav-item">
            <a class="navbar-brand ps-3" href="{{ route('publishers') }}">Publishers</a>
        </div>
        <div class="nav-item">
            <a class="navbar-brand ps-3" href="{{ route('categories') }}">Categories</a>
        </div>
        <div class="nav-item">
            <a class="navbar-brand ps-3" href="{{ route('students') }}">Students</a>
        </div>
        <div class="nav-item">
            <a class="navbar-brand ps-3" href="{{ route('book_issued') }}">Book_issued</a>
        </div>
        <div class="nav-item">
            <a class="navbar-brand ps-3" href="{{ route('reports') }}">Reports</a>
        </div>
        <div class="nav-item">
            <a class="navbar-brand ps-3 d-flex" href="{{ route('settings') }}">Setting</a>
        </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('change_password') }}">Change Password</a>
                    <a class="dropdown-item" href="#" onclick="document.getElementById('logoutForm').submit()">Log Out</a>
                </div>
                <form method="post" id="logoutForm" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>

    </nav>
    <!--
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    Menu Bar 
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-powerpoint">
                        </div>Dashboard
                    </a>
                    <a class="nav-link" href="{{ route('authors') }}">
                        <div class="sb-nav-link-icon"> <i class="fas fa-file-powerpoint"></i>
                        </div>Authors
                    </a>
                    <a class="nav-link" href="{{ route('publishers') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-powerpoint">
                        </div>Publishers
                    </a>
                    <a class="nav-link" href="{{ route('categories') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-powerpoint">
                        </div>Categories
                    </a>
                    <a class="nav-link" href="{{ route('books') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-powerpoint">
                        </div>Books
                    </a></li>
                    <a class="nav-link" href="{{ route('students') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-powerpoint">
                        </div>Reg Students
                    </a>
                    <a class="nav-link" href="{{ route('book_issued') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-powerpoint">
                        </div>Book Issue
                    </a>
                    <a class="nav-link" href="{{ route('reports') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-powerpoint">
                        </div>Reports
                    </a>
                    <a class="nav-link" href="{{ route('settings') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-powerpoint">
                        </div>Settings
                    </a>
                </div>
            </div>
        </nav>
    </div>
-->
    </nav>
    @yield('content')

    <!-- FOOTER -->

    <!-- /FOOTER -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>