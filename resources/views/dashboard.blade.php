<!-- dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        <h1>Teacher Dashboard</h1>

        @if ($assignedClasses->count() > 0)
            <ul class="semester-list">
                @foreach ($assignedClasses->groupBy('semester.semester_name') as $semesterName => $classes)
                    <li>
                        <strong>{{ $semesterName }}</strong>
                        <ul class="assigned-classes-list">
                            @foreach ($classes as $class)
                                <li>
                                    {{ $class->ClassName }} - {{ $class->course->CourseName }}
                                    <div class="action-buttons">
                                        <a href="{{ route('Quiz.create', ['class_id' => $class->id]) }}" class="btn btn-primary">Create Quiz</a>
                                        <a href="{{ route('Assignment.create', ['class_id' => $class->id]) }}" class="btn btn-success">Create Assignment</a>
                                        <a href="{{ route('showQuizzes', ['class_id' => $class->id]) }}" class="btn btn-info">Show Quizzes</a>
                                        <a href="{{ route('showAssignments', ['class_id' => $class->id]) }}" class="btn btn-warning">Show Assignments</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No assigned classes.</p>
        @endif
    </div>
@endsection
