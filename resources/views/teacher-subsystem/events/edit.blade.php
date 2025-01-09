@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Event</h2>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $event->date }}" required>
        </div>
        
        <style>
            .container {
                max-width: 600px; /* Ensure the form doesn't stretch too wide */
            }
            .form-group {
                margin-bottom: 1.5rem; /* Ensure consistent spacing between fields */
            }
            .form-control {
                width: 100%; /* Ensure all inputs take full width */
                padding: 0.75rem; /* Adjust padding for consistency */
                font-size: 1rem;
            }
            button {
                width: 100%; /* Ensure the button spans the same width as the input fields */
            }
        </style>
        
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
