@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Homework</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('homework.update', $homework->id) }}" method="POST">
        @csrf
        @method('PUT')
 

        <div class="form-group">
            <label for="subject_name">Subject Name</label>
            <input type="text" name="subject_name" class="form-control" id="subject_name" required value="{{ $homework->subject_name }}">
        </div>

        <div class="form-group">
            <label for="class_id">Class ID</label>
            <input type="text" name="class_id" class="form-control" id="class_id" required value="{{ $homework->class_id }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ $homework->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control" id="due_date" required value="{{ $homework->due_date }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Homework</button>
    </form>
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
@endsection
