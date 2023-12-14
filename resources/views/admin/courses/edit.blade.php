@extends('dashboard.admindash')

@section('content')
    <div class="admin-panel">
        <!-- ... (existing code) ... -->

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Edit Course</h1>
            </header>

            <section class="content">
                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Add form fields for editing a course -->
                    <label for="CourseCode">Course Code:</label>
                    <input type="text" name="CourseCode" id="name" value="{{ $course->CourseCode }}" required>

                    <label for="CourseName">Course Name:</label>
                    <input type="text" name="CourseName" id="name" value="{{ $course->CourseName }}" required>

                    <label for="CourseDescription">Course Description:</label>
                    <input type="text" name="CourseDescription" id="name" value="{{ $course->CourseDescription }}" required>

                    <label for="CourseCredit">Course Credit:</label>
                    <input type="text" name="CourseCredit" id="name" value="{{ $course->CourseCredit }}" required>

                    <button type="submit" class="btn btn-primary">Update Course</button>
                </form>
            </section>
        </main>
    </div>
@endsection