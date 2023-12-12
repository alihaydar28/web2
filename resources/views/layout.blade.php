<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
    <header>
        <div class="logo" title="University Management System">
            <img src="{{ asset('assets/images/logo.png') }}" alt="">
            <h2>U<span class="danger">Mm</span>S</h2>
        </div>
        <div class="navbar">
            <a href="{{ route('studentDashboard') }}"
                class="{{ request()->routeIs('studentDashboard') ? 'active' : '' }}">
                <span class="material-icons-sharp">home</span>
                <h3>Home</h3>
            </a>
            <a href="{{ route('enrollmentCourses') }}"
                class="{{ request()->routeIs('enrollmentCourses') ? 'active' : '' }}">
                <span class="material-icons-sharp">today</span>
                <h3>Enroll</h3>
            </a>
            <a href="{{ route('enrollmentCourses') }}"
                class="{{ request()->routeIs('enrollmentCourses') ? 'active' : '' }}">
                <span class="material-icons-sharp">today</span>
                <h3>Schedule</h3>
            </a>
            <a href="{{ route('enrollmentCourses') }}"
                class="{{ request()->routeIs('enrollmentCourses') ? 'active' : '' }}">
                <span class="material-icons-sharp">today</span>
                <h3>Attendance</h3>
            </a>
            <a href="#" onclick="document.getElementById('logout-form').submit();">
                <span class="material-icons-sharp">logout</span>
                <h3>Logout</h3>
            </a>

            <form id="logout-form" style="display: none;" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </div>
        <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="{{ asset('assets/timeTable.js') }}"></script>
    <script src="{{ asset('assets/app.js') }}"></script>
</body>

</html>
