@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Workshop</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('alumni.workshops.store', $alumni) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="WorkshopName">Workshop Name:</label>
                <input type="text" class="form-control" id="WorkshopName" name="WorkshopName" required>
            </div>
            <div class="form-group">
                <label for="WorkshopDecription">Workshop Description:</label>
                <textarea class="form-control" id="WorkshopDecription" name="WorkshopDecription" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="WorkshopDateAndTime">Workshop Date and Time:</label>
                <input type="datetime-local" class="form-control" id="WorkshopDateAndTime" name="WorkshopDateAndTime">
            </div>
            <div class="form-group">
                <label for="WorkshopLocation">Workshop Location:</label>
                <input type="text" class="form-control" id="WorkshopLocation" name="WorkshopLocation">
            </div>
            <div class="form-group">
                <label for="accepted">Accepted:</label>
                <select class="form-control" id="accepted" name="accepted" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Workshop</button>
        </form>
    </div>
@endsection
