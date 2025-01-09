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
                <label for="cukup_solat">Cukup Solat</label>
                <select name="cukup_solat" class="form-control">
                    <option value="A" {{ old('cukup_solat', $tarbiah->cukup_solat ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('cukup_solat', $tarbiah->cukup_solat ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('cukup_solat', $tarbiah->cukup_solat ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('cukup_solat', $tarbiah->cukup_solat ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('cukup_solat', $tarbiah->cukup_solat ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('cukup_solat', $tarbiah->cukup_solat ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amali_solat">Amali Solat</label>
                <select name="amali_solat" class="form-control">
                    <option value="A" {{ old('amali_solat', $tarbiah->amali_solat ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('amali_solat', $tarbiah->amali_solat ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('amali_solat', $tarbiah->amali_solat ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('amali_solat', $tarbiah->amali_solat ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('amali_solat', $tarbiah->amali_solat ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('amali_solat', $tarbiah->amali_solat ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tilawah_al_quran">Tilawah Al Quran</label>
                <select name="tilawah_al_quran" class="form-control">
                    <option value="A" {{ old('tilawah_al_quran', $tarbiah->tilawah_al_quran ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('tilawah_al_quran', $tarbiah->tilawah_al_quran ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('tilawah_al_quran', $tarbiah->tilawah_al_quran ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('tilawah_al_quran', $tarbiah->tilawah_al_quran ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('tilawah_al_quran', $tarbiah->tilawah_al_quran ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('tilawah_al_quran', $tarbiah->tilawah_al_quran ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mathurat">Mathurat</label>
                <select name="mathurat" class="form-control">
                    <option value="A" {{ old('mathurat', $tarbiah->mathurat ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('mathurat', $tarbiah->mathurat ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('mathurat', $tarbiah->mathurat ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('mathurat', $tarbiah->mathurat ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('mathurat', $tarbiah->mathurat ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('mathurat', $tarbiah->mathurat ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="feedback">Feedback</label>
                <textarea name="feedback" class="form-control">{{ old('feedback', $tarbiah->feedback ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Grades</button>
        </form>
    </div>

    <!-- Optional CSS to ensure alignment -->
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

