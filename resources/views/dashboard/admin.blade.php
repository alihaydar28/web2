<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
body {
    margin: 0;
    font-family: 'Arial', sans-serif;
}

.admin-panel {
    display: flex;
    height: 100vh;
}

.sidebar {
    background-color: #333;
    color: #fff;
    width: 250px;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.logo {
    font-size: 1.5em;
    margin-bottom: 20px;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

li {
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

a:hover {
    color: #ffd700;
}

.main-content {
    flex: 1;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.menu-toggle {
    cursor: pointer;
    font-size: 1.5em;
    margin-right: 20px;
}

.user-menu {
    display: flex;
    align-items: center;
}

.user-avatar {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    border-radius: 50%;
    margin-right: 10px;
}

.user-dropdown {
    position: relative;
}

.user-dropdown ul {
    display: none;
    position: absolute;
    top: 30px;
    right: 0;
    background-color: #333;
    padding: 10px;
    list-style-type: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.user-dropdown:hover ul {
    display: block;
}
.header a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    margin-right: 20px;
}

.header a:hover {
    color: #ffd700;
}
.top-nav {
    position: fixed;
    top: 10px;
    right: 10px;
    background-color: #333; /* Same as the sidebar background color */
    padding: 10px;
    border-radius: 5px;
    z-index: 1000; /* Ensure it appears above other elements */
}

.top-nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.top-nav li {
    display: inline-block;
    margin-right: 10px;
}

.top-nav a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

.top-nav a:hover {
    color: #ffd700;
}

.dashboard-counts {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.count-item {
    text-align: center;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border-radius: 5px;
}

.count {
    font-size: 2em;
    font-weight: bold;
}

.label {
    display: block;
    margin-top: 5px;
}

    </style>

<body>

    <div class="admin-panel">

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">Admin Panel</div>
            <ul>
                <li><a href="{{ route('admin.students.index') }}">Students</a></li>
                <li><a href="{{ route('admin.teachers.index') }}">Teachers</a></li>
                <li><a href="#">Parent</a></li>
                <li><a href="{{ route('admin.courses.index') }}">Courses</a></li>
                <li><a href="#">Class</a></li>
            </ul>
        </aside>

        !-- Top Right Navigation Bar -->
        <nav class="top-nav">
            <ul>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
        </nav>

        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            <button type="submit" id="logout-btn">Logout</button>
        </form>

            <section class="content">
                <h1>Welcome to the Admin Panel</h1>
                <div class="dashboard-counts">
                    <div class="count-item">
                        <span class="count">{{ $totalStudents }}</span>
                        <span class="label">Students</span>
                    </div>
                    <div class="count-item">
                        <span class="count">{{ $totalTeachers }}</span>
                        <span class="label">Teachers</span>
                    </div>
                    <div class="count-item">
                        <span class="count">{{ $totalCourses }}</span>
                        <span class="label">Courses</span>
                    </div>
                    
                </div>
            </section>
        </main>

    </div>

    <script src="scripts.js"></script>
    
</body>

</html>
