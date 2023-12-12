
@extends('layouts.app')

@section('content')
    <div class="edit-assignment-container">
        <h1>Edit Assignment</h1>

        <form action="{{ route('Assignment.update', ['Assignment' => $myeditdata->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="assignment_name">Assignment Title:</label>
            <input type="text" name="assignment_name" value="{{ $myeditdata->assignment_name }}" required>

            <label for="assignment_description">Description:</label>
            <textarea name="assignment_description" required>{{ $myeditdata->assignment_description }}</textarea>

            <label for="assignment_start_date">Start Date:</label>
            <input type="date" name="assignment_start_date" value="{{ $myeditdata->assignment_start_date }}">

            <label for="assignment_end_date">End Date:</label>
            <input type="date" name="assignment_end_date" value="{{ $myeditdata->assignment_end_date }}">

            @if ($myeditdata->file_path)
                <div>
                    <label for="current_file_path">Current File Path:</label>
                    <span>{{ $myeditdata->file_path }}</span>
                </div>
                <img src="{{ asset('files/' .$myeditdata->file_path) }}" alt="" class="file" id="file_path">
            @else
                <div>
                    <label for="current_file_path">Current File Path:</label>
                    <span>No file uploaded</span>
                </div>
            @endif

            <div>
                <label for="new_file_path">New File Path:</label>
                <input type="file" name="file_path" accept=".pdf, .doc, .docx">
            </div>

            <button type="submit">Update Assignment</button>
        </form>
    </div>
@endsection
