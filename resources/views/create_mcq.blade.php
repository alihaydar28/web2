
@extends('layouts.app')

@section('content')
    <div class="mcq-choices-container">
        <h1>Create MCQ Choices</h1>

        <form action="{{ route('MCQChoice.store') }}" method="POST">
            @csrf

            <input type="hidden" id="question_id" name="question_id" value="{{ request('question_id') }}">

            <label for="ChoiceText1">Choice 1:</label>
            <input type="text" name="ChoiceText1" required>
            <label for="IsCorrect1">Is Correct?</label>
            <input type="checkbox" name="IsCorrect1">

            <label for="ChoiceText2">Choice 2:</label>
            <input type="text" name="ChoiceText2" required>
            <label for="IsCorrect2">Is Correct?</label>
            <input type="checkbox" name="IsCorrect2">


            <label for="ChoiceText3">Choice 3:</label>
            <input type="text" name="ChoiceText3" required>
            <label for="IsCorrect3">Is Correct?</label>
            <input type="checkbox" name="IsCorrect3">

            <button type="submit">Add Choices</button>
        </form>
    </div>
@endsection
