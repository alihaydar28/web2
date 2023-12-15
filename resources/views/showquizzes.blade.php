@extends('layouts.app')

@section('content')
    <div class="quizzes-container">
        <h1>Quizzes</h1>

        @if ($quizzes->count() > 0)
            <div class="row">
                @foreach ($quizzes as $quiz)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $quiz->QuizTitle }}</h5>
                                <p class="card-text"><strong>Description:</strong> {{ $quiz->QuizDescription }}</p>
                                <p class="card-text"><strong>Date and Time:</strong> {{ $quiz->QuizDateAndTime }}</p>
                                <p class="card-text"><strong>Duration (minutes):</strong> {{ $quiz->QuizDurationMin }}</p>

                                <div class="mt-3">

                                    <a href="{{ route('Quiz.edit', ['Quiz' => $quiz->id]) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('Quiz.destroy', ['Quiz' => $quiz->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this quiz?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No quizzes available.</p>
        @endif
    </div>
@endsection
