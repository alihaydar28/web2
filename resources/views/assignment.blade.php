

@extends('layouts.app')

@section('content')
    <div class="create-assignment-container">
        <h1>Create Assignment</h1>

        <form action="{{ route('Assignment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="class_id" name="class_id" value="{{ request('class_id') }}">

            <!-- Add input fields based on your assignments table structure -->
            <label for="assignment_title">Assignment Title:</label>
            <input type="text" name="assignment_name" required>

            <label for="description">Description:</label>
            <textarea name="assignment_description" required></textarea>

            <label for="assignment_start_date">Start Date:</label>
            <input type="date" name="assignment_start_date">

            <label for="assignment_end_date">End Date:</label>
            <input type="date" name="assignment_end_date">

            <div class="form-group">
                <label for="file_path">File Path:</label>
                <input type="file" class="form-control-file" id="file_path" name="file_path" accept=".pdf, .doc, .docx"></td>
            </div>
            <button type="submit">Create Assignment</button>
        </form>
    </div>
@endsection
