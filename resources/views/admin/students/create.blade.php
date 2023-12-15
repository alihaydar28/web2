@extends('dashboard.admindash')

<!-- resources/views/admin/students/create.blade.php -->



@section('content')
    <div class="admin-panel">
        <!-- ... (existing code) ... -->

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Create Student</h1>
            </header>

            <section class="content">
                <form action="{{ route('admin.students.store') }}" method="POST">
                    @csrf

                    <!-- Add form fields as needed -->
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" id="name" class="form-control" required>
                    </div>

                    

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="current_address">Address</label>
                        <input type="text" name="current_address" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="role_id">Role Id</label>
                        <input type="text" name="role_id" id="name" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Student</button>
                </form>
            </section>
        </main>
    </div>
@endsection
