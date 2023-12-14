
@extends('layouts.app')

@section('content')
    <div class="attendance-container">
        <h1>Attendance for {{ $courseClass->ClassName }}</h1>

        <form method="post" action="{{ route('attendance.store') }}">
            @csrf

            <input type="hidden" name="courseclass_id" value="{{ $courseClass->id }}">

            <table>
                <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($enrolledStudents as $enrollment)
                    <tr>
                        <td>{{ $enrollment->pivot->student_id ?? 'N/A' }}</td>
                        <td>{{ $enrollment->user->firstname ?? 'N/A' }} {{ $enrollment->user->lastname ?? 'N/A' }}</td>
                        <td>
                            <input type="checkbox" name="attendance[{{ $enrollment->pivot->student_id }}]" checked>
                            <input type="hidden" name="students[]" value="{{ $enrollment->pivot->student_id }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="submit">Submit Attendance</button>
        </form>
    </div>
@endsection
