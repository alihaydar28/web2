@extends('layout')
@section('content')
    <div class="container">
        <main>
            <h1>Courses</h1>
            <div class="subjects">

                @forelse ($allCourses as $course)
                    <div class="eg">
                        <span class="material-icons-sharp"></span>
                        <h3>{{ $course->CourseName }}</h3>
                        <h3>code: {{ $course->CourseCode }}</h3>
                        <h3>credit: {{ $course->CourseCredit }}</h3>
                        <a href="{{ route("enrollmentClasses", ['courseId' => $course->id]) }}">View More</a>
                    </div>
                @empty
                    <div class="eg">
                        <h3>No Courses found</h3>
                    </div>
                @endforelse
            </div>
        </main>
    </div>
@endsection
