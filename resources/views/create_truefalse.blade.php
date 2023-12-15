@extends('layouts.app')

@section('content')
    <div class="truefalse-questions-container">
        <h1>Create True/False Question</h1>

        <form action="{{ route('TrueFalse.store') }}" method="POST">
            @csrf

            <input type="hidden" id="question_id" name="question_id" value="{{ request('question_id') }}">


            <label for="IsTrue">Is True?</label>
            <select name="IsTrue" required>
                <option value="1">True</option>
                <option value="0">False</option>
            </select>

            <button type="submit">Add True/False Question</button>
        </form>
    </div>
@endsection
