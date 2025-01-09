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
                    <option value="D" {{ old('bm', $academic->bm ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('bm', $academic->bm ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('bm', $academic->bm ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bi">BI</label>
                <select name="bi" class="form-control">
                    <option value="A" {{ old('bi', $academic->bi ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('bi', $academic->bi ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('bi', $academic->bi ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('bi', $academic->bi ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('bi', $academic->bi ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('bi', $academic->bi ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sains">Sains</label>
                <select name="sains" class="form-control">
                    <option value="A" {{ old('sains', $academic->sains ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('sains', $academic->sains ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('sains', $academic->sains ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('sains', $academic->sains ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('sains', $academic->sains ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('sains', $academic->sains ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>
            <div class="form-group">
                <label for="matematik">Matematik</label>
                <select name="matematik" class="form-control">
                    <option value="A" {{ old('matematik', $academic->matematik ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('matematik', $academic->matematik ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('matematik', $academic->matematik ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('matematik', $academic->matematik ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('matematik', $academic->matematik ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('matematik', $academic->matematik ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="RBT">RBT</label>
                <select name="RBT" class="form-control">
                    <option value="A" {{ old('RBT', $academic->RBT ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('RBT', $academic->RBT ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('RBT', $academic->RBT ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('RBT', $academic->RBT ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('RBT', $academic->RBT ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('RBT', $academic->RBT ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="PJK">PJK</label>
                <select name="PJK" class="form-control">
                    <option value="A" {{ old('PJK', $academic->PJK ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('PJK', $academic->PJK ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('PJK', $academic->PJK ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('PJK', $academic->PJK ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('PJK', $academic->PJK ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('PJK', $academic->PJK ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="PSV">PSV</label>
                <select name="PSV" class="form-control">
                    <option value="A" {{ old('PSV', $academic->PSV ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('PSV', $academic->PSV ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('PSV', $academic->PSV ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('PSV', $academic->PSV ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('PSV', $academic->PSV ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('PSV', $academic->PSV ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="Sejarah">Sejarah</label>
                <select name="Sejarah" class="form-control">
                    <option value="A" {{ old('Sejarah', $academic->Sejarah ?? '') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('Sejarah', $academic->Sejarah ?? '') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('Sejarah', $academic->Sejarah ?? '') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('Sejarah', $academic->Sejarah ?? '') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('Sejarah', $academic->Sejarah ?? '') == 'E' ? 'selected' : '' }}>E</option>
                    <option value="F" {{ old('Sejarah', $academic->Sejarah ?? '') == 'F' ? 'selected' : '' }}>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="feedback">Feedback</label>
                <textarea name="feedback" class="form-control">{{ old('feedback', $academic->feedback ?? '') }}</textarea>
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

