@extends('dashboard.admindash')

<!-- resources/views/admin/students/index.blade.php -->


@section('content')
    <div class="admin-panel">
        <!-- ... (existing code) ... -->

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Student List</h1>
                <a href="{{ route('admin.students.create') }}" class="btn btn-primary">Add Student</a>
            </header>

            <section class="content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->user->firstname }}</td>
                                <td>{{ $student->user->lastname }}</td>
                                <td>{{ $student->user->gender }}</td>
                                <td>{{ $student->user->dateofbirth }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td>{{ $student->user->password }}</td>
                                <td>{{ $student->user->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
