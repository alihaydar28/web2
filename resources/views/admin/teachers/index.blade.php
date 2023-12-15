@extends('dashboard.admindash')



@section('content')
    <div class="admin-panel">
        <!-- ... (existing code) ... -->

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Teacher List</h1>
                <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">Add Student</a>
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
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->user->firstname }}</td>
                                <td>{{ $teacher->user->lastname }}</td>
                                <td>{{ $teacher->user->gender }}</td>
                                <td>{{ $teacher->user->dateofbirth }}</td>
                                <td>{{ $teacher->user->email }}</td>
                                <td>{{ $teacher->user->password }}</td>
                                <td>{{ $teacher->user->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" style="display: inline;">
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