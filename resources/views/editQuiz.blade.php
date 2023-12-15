@extends('layouts.app')

@section('content')
    <div class="edit-quiz-container">
        <h1>Edit Quiz</h1>

        @if ($myeditdata)
            <form action="{{ route('Quiz.update', ['Quiz' => $myeditdata->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="QuizTitle">Quiz Title:</label>
                <input type="text" name="QuizTitle" value="{{ $myeditdata->QuizTitle }}" required>
                <br>

                <label for="QuizDescription">Quiz Description:</label>
                <textarea name="QuizDescription" required>{{ $myeditdata->QuizDescription }}</textarea>
                <br>

                <label for="QuizDateAndTime">Quiz Date and Time:</label>
                <input type="datetime-local" name="QuizDateAndTime" value="{{ \Carbon\Carbon::parse($myeditdata->QuizDateAndTime)->format('Y-m-d\TH:i') }}" required>
                <br>

                <label for="QuizDurationMin">Quiz Duration (minutes):</label>
                <input type="number" name="QuizDurationMin" value="{{ $myeditdata->QuizDurationMin }}" min="1" required>
                <br>

                <h2>Questions:</h2>
                @foreach ($myeditdata->questions as $question)
                    <label for="question[{{ $question->id }}][QuestionText]">Question Text:</label>
                    <input type="text" name="questions[{{ $question->id }}][QuestionText]" value="{{ $question->QuestionText }}" required>
                    <br>

                    @if ($question->IsMCQ)
                        <!-- Display MCQ Choices for editing -->
                        @foreach ($question->mcqChoices as $choice)
                            <label for="questions[{{ $question->id }}][mcq_choices][{{ $choice->id }}][ChoiceText]">Choice Text:</label>
                            <input type="text" name="questions[{{ $question->id }}][mcq_choices][{{ $choice->id }}][ChoiceText]" value="{{ $choice->ChoiceText }}" required>
                            <label for="questions[{{ $question->id }}][mcq_choices][{{ $choice->id }}][isCorrect]">Is Correct:</label>
                            <input type="checkbox" name="questions[{{ $question->id }}][mcq_choices][{{ $choice->id }}][isCorrect]" {{ $choice->IsCorrect ? 'checked' : '' }}>
                            <br>
                        @endforeach
                    @elseif ($question->IsTrueFalse)
                        <!-- Display True/False Answer for editing -->
                        <label for="questions[{{ $question->id }}][true_false_answer][IsTrue]">Is True:</label>
                        <input type="checkbox" name="questions[{{ $question->id }}][true_false_answer][IsTrue]" {{ $question->trueFalseAnswer->IsTrue ? 'checked' : '' }}>
                        <br>
                    @elseif ($question->IsFreeText)
                        <!-- Display FreeText Answer for editing -->
                        <label for="questions[{{ $question->id }}][free_text_answer][AnswerText]">Answer Text:</label>
                        <textarea name="questions[{{ $question->id }}][free_text_answer][AnswerText]">{{ $question->freeTextAnswer->AnswerText }}</textarea>
                        <br>
                    @endif
                @endforeach

                <button type="submit">Update Quiz</button>
            </form>
            <!-- Add Question button -->
            <form action="{{ route('QuizQuestions.create') }}" method="GET">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $myeditdata->id }}">
                <button type="submit">Add Question</button>
            </form>

        @else
            <p>No quiz data available for editing.</p>
        @endif
    </div>
@endsection
