<!-- resources/views/homework/index.blade.php -->
@extends('teacher-subsystem.layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Homework List</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Class ID</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($homeworks as $homework)
                    <tr>
                        <td>{{ $homework->subject_name }}</td>
                        <td>{{ $homework->class_id }}</td>
                        <td>{{ $homework->description }}</td>
                        <td>{{ $homework->due_date }}</td>
                        <td>
                            <!-- Edit button -->
                            <a href="{{ route('homework.edit', $homework->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('homework.destroy', $homework->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
