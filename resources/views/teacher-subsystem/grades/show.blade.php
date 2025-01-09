@extends('teacher-subsystem.layouts.app')

@section('content')
<div class="container">
    <h1>Grading for {{ $student->name }}</h1>

    <form action="{{ route('grading.store', $student->id) }}" method="POST">
        @csrf
        @foreach ($subjects as $subject)
            <div class="form-group">
                <label for="grade_{{ $subject->id }}">{{ $subject->name }} ({{ $subject->category }})</label>
                <input type="text" name="grades[{{ $subject->id }}][grade]" id="grade_{{ $subject->id }}" class="form-control" 
                       value="{{ old('grades.'.$subject->id.'.grade', optional($grades->firstWhere('subject_id', $subject->id))->grade) }}" 
                       required>
                <input type="hidden" name="grades[{{ $subject->id }}][subject_id]" value="{{ $subject->id }}">
            </div>
        @endforeach

        <div class="form-group">
            <label for="feedback">Feedback for {{ $student->name }}</label>
            <textarea name="feedback" id="feedback" class="form-control" placeholder="Enter feedback">{{ old('feedback', $feedback->feedback ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Grades and Feedback</button>
    </form>
</div>
@endsection
