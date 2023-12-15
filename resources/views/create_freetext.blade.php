@extends('layouts.app')

@section('content')
    <div class="freetext-answers-container">
        <h1>Create Free Text Answer</h1>

        <form action="{{ route('FreeText.store') }}" method="POST">
            @csrf

            <input type="hidden" id="question_id" name="question_id" value="{{ request('question_id') }}">

            <label for="AnswerText">Answer Text:</label>
            <textarea name="AnswerText" required></textarea>

            <button type="submit">Add Free Text Answer</button>
        </form>
    </div>
@endsection
