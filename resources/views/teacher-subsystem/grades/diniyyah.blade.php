@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>Grade Student: {{ $student->name }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('diniyyah.store', $student->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Akhlak">Akhlak</label>
                <select name="Akhlak" class="form-control">
                    <option value="A" {{ old('Akhlak', $diniyyah->Akhlak ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('Akhlak', $diniyyah->Akhlak ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('Akhlak', $diniyyah->Akhlak ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('Akhlak', $diniyyah->Akhlak ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('Akhlak', $diniyyah->Akhlak ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('Akhlak', $diniyyah->Akhlak ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Aqidah">Aqidah</label>
                <select name="Aqidah" class="form-control">
                    <option value="A" {{ old('Aqidah', $diniyyah->Aqidah ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('Aqidah', $diniyyah->Aqidah ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('Aqidah', $diniyyah->Aqidah ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('Aqidah', $diniyyah->Aqidah ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('Aqidah', $diniyyah->Aqidah ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('Aqidah', $diniyyah->Aqidah ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Sirah">Sirah</label>
                <select name="Sirah" class="form-control">
                    <option value="A" {{ old('Sirah', $diniyyah->Sirah ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('Sirah', $diniyyah->Sirah ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('Sirah', $diniyyah->Sirah ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('Sirah', $diniyyah->Sirah ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('Sirah', $diniyyah->Sirah ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('Sirah', $diniyyah->Sirah ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Fiqh">Fiqh</label>
                <select name="Fiqh" class="form-control">
                    <option value="A" {{ old('Fiqh', $diniyyah->Fiqh ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('Fiqh', $diniyyah->Fiqh ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('Fiqh', $diniyyah->Fiqh ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('Fiqh', $diniyyah->Fiqh ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('Fiqh', $diniyyah->Fiqh ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('Fiqh', $diniyyah->Fiqh ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Bahasa_Arab">Bahasa Arab</label>
                <select name="Bahasa_Arab" class="form-control">
                    <option value="A" {{ old('Bahasa_Arab', $diniyyah->Bahasa_Arab ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('Bahasa_Arab', $diniyyah->Bahasa_Arab ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('Bahasa_Arab', $diniyyah->Bahasa_Arab ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('Bahasa_Arab', $diniyyah->Bahasa_Arab ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('Bahasa_Arab', $diniyyah->Bahasa_Arab ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('Bahasa_Arab', $diniyyah->Bahasa_Arab ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Tulisan_Jawi">Tulisan Jawi</label>
                <select name="Tulisan_Jawi" class="form-control">
                    <option value="A" {{ old('Tulisan_Jawi', $diniyyah->Tulisan_Jawi ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('Tulisan_Jawi', $diniyyah->Tulisan_Jawi ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('Tulisan_Jawi', $diniyyah->Tulisan_Jawi ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('Tulisan_Jawi', $diniyyah->Tulisan_Jawi ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('Tulisan_Jawi', $diniyyah->Tulisan_Jawi ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('Tulisan_Jawi', $diniyyah->Tulisan_Jawi ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="feedback">Feedback</label>
                <textarea name="feedback" class="form-control">{{ old('feedback', $diniyyah->feedback ?? '') }}</textarea>
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

