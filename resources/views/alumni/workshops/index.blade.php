@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Workshops</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date and Time</th>
                    <th>Location</th>
                    <th>Accepted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workshops as $workshop)
                    <tr>
                        <td>{{ $workshop->id }}</td>
                        <td>{{ $workshop->WorkshopName }}</td>
                        <td>{{ $workshop->WorkshopDecription }}</td>
                        <td>{{ $workshop->WorkshopDateAndTime ? $workshop->WorkshopDateAndTime->format('Y-m-d H:i:s') : 'N/A' }}</td>
                        <td>{{ $workshop->WorkshopLocation }}</td>
                        <td>{{ $workshop->accepted ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('alumni.workshops.show', [$alumni, $workshop]) }}" class="btn btn-info">View</a>
                            <a href="{{ route('alumni.workshops.edit', [$alumni, $workshop]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('alumni.workshops.destroy', [$alumni, $workshop]) }}" method="post" style="display:inline;">
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
