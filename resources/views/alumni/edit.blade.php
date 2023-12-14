@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Alumni</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('alumni.update', $alumni) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $alumni->firstname }}" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $alumni->lastname }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="male"{{ $alumni->gender === 'male' ? ' selected' : '' }}>Male</option>
                    <option value="female"{{ $alumni->gender === 'female' ? ' selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateofbirth">Date of Birth:</label>
                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ $alumni->dateofbirth ? $alumni->dateofbirth->format('Y-m-d') : '' }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email
