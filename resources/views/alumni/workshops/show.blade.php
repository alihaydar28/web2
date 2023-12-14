@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Workshop Details</h2>

        <p><strong>Name:</strong> {{ $workshop->WorkshopName }}</p>
        <p><strong>Description:</strong> {{ $workshop->WorkshopDecription ?: 'N/A' }}</p>
        <p><strong>Date and Time:</strong>
