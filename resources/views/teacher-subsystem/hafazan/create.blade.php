@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Flex container for Assign Hafazan & Tilawah and View Student Recitation -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; width: 100%;">
            <h2 style="margin-right: auto;">Assign Hafazan & Tilawah</h2>
            <a href="{{ route('hafazan.list') }}" class="btn btn-view">
                <i class="fas fa-eye"></i> View Student Recitation
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('hafazan.store') }}" method="POST">
            @csrf

            <!-- Student Name & ID -->
            <div class="form-group">
                <label for="student_id">Student Name (ID)</label>
                <select id="student_id" name="student_id" class="form-control custom-select" required>
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">
                            {{ $student->name }} (ID: {{ $student->id }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Surah Selection -->
            <div class="form-group">
                <label for="surah_id">Surah</label>
                <select id="surah_id" name="surah_name" class="form-control custom-select dropdown-down" required>
                    <option value="">Select Surah</option>
                    @foreach($surahs as $surah)
                        <option value="{{ $surah }}">{{ $surah }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Ayah Number -->
            <div class="form-group">
                <label for="ayah_number">Ayah Number</label>
                <input type="number" name="ayah_number" id="ayah_number" class="form-control" required>
            </div>

            <!-- Recite Date -->
            <div class="form-group">
                <label for="recite_date">Date for Reciting</label>
                <input type="date" name="recite_date" id="recite_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <!-- Optional CSS -->
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

        /* Styling for the View Student Recitation button */
        .btn-view {
            background-color: #17a2b8; /* Bootstrap's info color */
            border-color: #17a2b8;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 5px; /* Space between the icon and text */
            font-size: 0.9rem; /* Adjust text size */
            padding: 0.5rem 1rem; /* Adjust button padding */
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s ease; /* Smooth hover effect */
        }

        .btn-view:hover {
            background-color: #117a8b;
            border-color: #117a8b;
            color: white;
        }

        /* Custom CSS for dropdown */
        .dropdown-down {
            position: relative;
            z-index: 10;
        }

        .dropdown-down option {
            overflow-y: auto;
            max-height: 200px;
        }
    </style>

    <!-- JavaScript to disable past dates and show the warning -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get today's date
            const today = new Date().toISOString().split('T')[0];
            // Set the 'min' attribute to today's date, so past dates are disabled
            document.getElementById("recite_date").setAttribute("min", today);

            // Show warning if the selected date is in the past
            const reciteDateInput = document.getElementById("recite_date");
            const dateWarning = document.getElementById("dateWarning");

            reciteDateInput.addEventListener("change", function() {
                if (reciteDateInput.value < today) {
                    dateWarning.style.display = "block"; // Show the warning
                    reciteDateInput.setCustomValidity("Please select a future date.");
                } else {
                    dateWarning.style.display = "none"; // Hide the warning
                    reciteDateInput.setCustomValidity(""); // Reset custom validity
                }
            });
        });
    </script>
@endsection
