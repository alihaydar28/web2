@extends('dashboard.admindash')



@section('content')
    <div class="admin-panel">
        <!-- ... (existing code) ... -->

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Edit Teacher</h1>
            </header>

            <section class="content">
                <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Add form fields as needed -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->user->email }}" required>
                    </div>

                    <!-- Add other form fields to edit -->

                    <button type="submit" class="btn btn-primary">Update Teacher</button>
                </form>
            </section>
        </main>
    </div>
@endsection
