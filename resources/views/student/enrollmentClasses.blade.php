@extends('layout')
@section('content')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <div class="container">
        <aside>
            <div class="profile">
                <a href="{{ route('enrollmentCourses') }}" style="color: red"><-- go back to courses</a>
                <br> <br>
                <div>
                    <h2>Course Details: </h2>
                    <br>
                    <p><b>code:</b> {{ $selectedCourse->CourseCode }}</p><br>
                    <p><b>name:</b> {{ $selectedCourse->CourseName }}</p><br>
                    <p><b>description:</b> {{ $selectedCourse->CourseDescription }}</p><br>
                    <p><b>credit:</b> {{ $selectedCourse->CourseCredit }}</p>

                    <br><br><br>

                </div>
            </div>
        </aside>

        <main>

            <div class="timetable" id="timetable">

                        <br>
                        <h2>Available classes for this course:</h2>
                        <br>

                        @if (session('message'))
                            <p style="color: red;">{{ session('message') }}</p>
                        @endif

                        @if (session('success'))
                            <p style="color: green;">{{ session('success') }}</p>
                        @endif

                        <table>
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Teacher</th>
                                    <th>Capacity</th>
                                    <th>Location</th>
                                    <th>Day and Time</th>
                                    <th>Status</th>
                                    <th>Enroll</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allClasses as $class)
                                    <tr>
                                        <td class="nowrap">{{ $class->ClassName }}</td>
                                        <td class="nowrap">
                                            {{ $class->teacher->user->firstname . ' ' . $class->teacher->user->lastname }}
                                        </td>
                                        <td class="nowrap">{{ $class->ClassCapacity }}</td>
                                        <td class="nowrap">{{ $class->ClassLocation }}</td>
                                        <td class="nowrap">
                                            {{ substr($class->ClassDay, 0, 3) . ' ' . \Carbon\Carbon::createFromFormat('H:i:s', $class->ClassTime)->format('g:i A') }}
                                        </td>
                                        <td>
                                            <div class="statuss" style="background-color: {{ $class->isFull() ? 'red' : 'green' }};">
                                            </div>
                                        </td>
                                        <td class="nowrap">
                                            @if (App\Models\Enrollment::isEnrolled(auth()->user()->student->id, $class->id))
                                                <a href="{{ route('drop', ['classId' => $class->id]) }}" style="color: red;">Drop</a>
                                            @elseif ($class->isFull())
                                                <span style="color: red;">Class Full</span>
                                            @else
                                                <a href="{{ route('enroll', ['classId' => $class->id]) }}" style="color: green;">Enroll</a>
                                            @endif
                                        </td>



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
            </div>
        </main>

        <div class="right" style="max-width: 300px">
            <br>
            <div class="leaves">
                <h2>Your Schedule</h2>
                @forelse ($classes as $class)
                <div class="teacher">
                    <div class="info">
                        <h3>{{ $class->Course->CourseName }}</h3>
                        <small class="text-muted">
                            {{ substr($class->ClassDay, 0, 3) . ' ' . \Carbon\Carbon::createFromFormat('H:i:s', $class->ClassTime)->format('g:i A') }}
                        </small> |
                        <small class="text-muted">location: {{ $class->ClassLocation }}</small>
                    </div>
                </div>
                @empty
                    <div class="eg">
                        <h3>No class found</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>



@endsection






<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 50px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    td.nowrap {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    a {
        display: contents;
        text-decoration: none;

    }

    p {
        font-size: 15px;
        display: contents;
    }

    b {
        display: contents;
    }

    .statuss {
        padding: 5px;
        border-radius: 20%;

    }
</style>
