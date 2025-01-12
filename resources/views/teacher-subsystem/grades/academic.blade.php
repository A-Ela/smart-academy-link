@extends('teacher-subsystem.layouts.app')

@section('content')
    <div class="container">
        <h2>Grade Student: {{ $student->name }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('academic.store', $student->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bm">BM</label>
                <select name="bm" class="form-control">
                    <option value="A" {{ old('bm', $academic->bm ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('bm', $academic->bm ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('bm', $academic->bm ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <!-- Add other options as needed -->
                </select>
            </div>
            <!-- Add other form fields as needed -->
            <button type="submit" class="btn btn-primary">Save Grades</button>
        </form>
    </div>
@endsection

