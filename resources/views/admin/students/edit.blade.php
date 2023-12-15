@extends('dashboard.admindash')

<!-- resources/views/admin/students/edit.blade.php -->



@section('content')
    <div class="admin-panel">
        <!-- ... (existing code) ... -->

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Edit Student</h1>
            </header>

            <section class="content">
                <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Add form fields as needed -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $student->user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $student->user->email }}" required>
                    </div>

                    <!-- Add other form fields to edit -->

                    <button type="submit" class="btn btn-primary">Update Student</button>
                </form>
            </section>
        </main>
    </div>
@endsection
