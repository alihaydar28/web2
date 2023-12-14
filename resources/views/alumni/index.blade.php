@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Alumni List</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumni as $alumnus)
                    <tr>
                        <td>{{ $alumnus->id }}</td>
                        <td>{{ $alumnus->firstname }}</td>
                        <td>{{ $alumnus->lastname }}</td>
                        <td>{{ $alumnus->email }}</td>
                        <td>
                            <a href="{{ route('alumni.show', $alumnus) }}" class="btn btn-info">View</a>
                            <a href="{{ route('alumni.edit', $alumnus) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('alumni.destroy', $alumnus) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
