@extends('dashboard.admindash')

@section('content')
    <div class="admin-panel">
        <!-- ... (existing code) ... -->

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Create Course</h1>
            </header>

            <section class="content">
                <form action="{{ route('admin.courses.store') }}" method="POST">
                    @csrf
                    <!-- Add form fields for creating a course -->
                    <label for="CourseCode">Course Code:</label>
                    <input type="text" name="CourseCode" id="CourseCode" required>

                    <label for="CourseName">Course Name:</label>
                    <textarea name="CourseName" id="CourseName" required></textarea>

                    <label for="CourseDescription">Course Description:</label>
                    <textarea name="CourseDescription" id="CourseDescription" required></textarea>

                    <label for="CourseCredit">Course Credit:</label>
                    <textarea name="CourseCredit" id="CourseCredit" required></textarea>

                    <button type="submit" class="btn btn-primary">Create Course</button>
                </form>
            </section>
        </main>
    </div>
@endsection