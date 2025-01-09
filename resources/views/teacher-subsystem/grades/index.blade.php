@extends('teacher-subsystem.layouts.app')

@section('content')
<div class="container">
    <h1>Grade Students</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student">Student</label>
            <select name="student_id" id="student" class="form-control" required>
                <option value="">Select a Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="e.g., Akhlak" required>
        </div>

        <div class="form-group">
            <label for="grade">Grade</label>
            <select name="grade" id="grade" class="form-control" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
            </select>
        </div>

        <div class="form-group">
            <label for="feedback">Feedback</label>
            <textarea name="feedback" id="feedback" class="form-control" placeholder="Optional feedback"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Grade</button>
    </form>
</div>
@endsection
