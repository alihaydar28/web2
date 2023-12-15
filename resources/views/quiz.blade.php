

@extends('layouts.app')

@section('content')
    <div class="quiz-container">
        <h1>Create Quiz</h1>

        <form action="{{ route('Quiz.store') }}" method="POST">
            @csrf

            <input type="hidden" id="class_id" name="class_id" value="{{ request('class_id') }}">

            <label for="QuizTitle">Quiz Title:</label>
            <input type="text" name="QuizTitle" required>
            <br>
            <label for="QuizDescription">Quiz Description:</label>
            <textarea name="QuizDescription" required></textarea>
            <br>
            <label for="QuizDateAndTime">Quiz Date and Time:</label>
            <input type="datetime-local" name="QuizDateAndTime" required>
            <br>
            <label for="QuizDurationMin">Quiz Duration (minutes):</label>
            <input type="number" name="QuizDurationMin" min="1" required>
            <br>
            <button type="submit">Next</button>
        </form>
    </div>
@endsection
