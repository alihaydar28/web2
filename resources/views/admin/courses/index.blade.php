@extends('dashboard.admindash')

@section('content')
    <div class="admin-panel">
        <!-- ... (existing code) ... -->

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Course List</h1>
                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Add Course</a>
            </header>

            <section class="content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Course Description</th>
                            <th>Course Credits</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->CourseCode }}</td>
                                <td>{{ $course->CourseName }}</td>
                                <td>{{ $course->CourseDescription }}</td>
                                <td>{{ $course->CourseCredit }}</td>
                                
                                <td>
                                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection