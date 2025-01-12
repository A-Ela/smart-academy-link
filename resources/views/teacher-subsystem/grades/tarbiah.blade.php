@extends('teacher-subsystem.layouts.app')

@section('content')
    <div class="container">
        <h2>Grade Student: {{ $student->name }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('tarbiah.store', $student->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Tarbiah">Tarbiah</label>
                <select name="Tarbiah" class="form-control">
                    <option value="A" {{ old('Tarbiah', $tarbiah->Tarbiah ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('Tarbiah', $tarbiah->Tarbiah ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('Tarbiah', $tarbiah->Tarbiah ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <!-- Add other options as needed -->
                </select>
            </div>
            <!-- Add other form fields as needed -->
            <button type="submit" class="btn btn-primary">Save Grades</button>
        </form>
    </div>
@endsection

