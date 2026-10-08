<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Course Management System')
    </title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-container">

            <div class="navbar-brand">
                <a href="{{ route('courses.index') }}" class="navbar-logo">
                    Course Management System
                </a>
            </div>

            <div class="navbar-links">
                <a href="{{ route('courses.index') }}" class="navbar-link">
                    Courses
                </a>

                <a href="{{ route('students.index') }}" class="navbar-link">
                    Students
                </a>
            </div>

            <div class="navbar-actions">
                <a href="{{ route('courses.create') }}" class="navbar-add">
                    Add Course
                </a>
            </div>

        </div>
    </nav>

    <main class="main-content">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>