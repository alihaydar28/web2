@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Alumni Details</h2>

        <p><strong>First Name:</strong> {{ $alumni->firstname }}</p>
        <p><strong>Last Name:</strong> {{ $alumni->lastname }}</p>
        <p><strong>Gender:</strong> {{ $alumni->gender }}</p>
        <p><strong>Date of Birth:</strong> {{ $alumni->dateofbirth ? $alumni->dateofbirth->format('Y-m-d') : 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $alumni->email }}</p>

        <a href="{{ route('alumni.edit', $alumni) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('alumni.destroy', $alumni) }}" method="post" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
