@extends('layouts.app')

@section('content')
    <div class="assignments-container">
        <h1>Assignments</h1>

        @if ($assignments->count() > 0)
            <div class="row">
                @foreach ($assignments as $assignment)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $assignment->assignment_name }}</h5>
                                <p class="card-text"><strong>Description:</strong> {{ $assignment->assignment_description }}</p>
                                <p class="card-text"><strong>Start Date:</strong> {{ $assignment->assignment_start_date }}</p>
                                <p class="card-text"><strong>End Date:</strong> {{ $assignment->assignment_end_date }}</p>


                                <div class="mt-3">
                                    <a href="{{ route('Assignment.edit', ['Assignment' => $assignment->id]) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('Assignment.destroy', ['Assignment' => $assignment->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this assignment?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No assignments available.</p>
        @endif
    </div>
@endsection
