@extends('teacher-subsystem.layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Flex container for Assign Homework and View Homework List -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; width: 100%;">
            <h2 style="margin-right: auto;">Assign Homework</h2>
            <a href="{{ route('homework.list') }}" class="btn btn-view">
                <i class="fas fa-eye"></i> View Homework List
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/homework') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" class="form-control" id="subject_name" required>
            </div>

            <div class="form-group">
                <label for="class_id">Class ID</label>
                <input type="text" name="class_id" class="form-control" id="class_id" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" class="form-control" id="due_date" required>
                <small id="dateWarning" class="form-text text-muted" style="display: none; color: red;">
                    Please select a future date for the homework.
                </small>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Assign Homework</button>
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

        /* Styling for the View Homework List button */
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
    </style>

    <!-- JavaScript to disable past dates and show the warning -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get today's date
            const today = new Date().toISOString().split('T')[0];
            // Set the 'min' attribute to today's date, so past dates are disabled
            document.getElementById("due_date").setAttribute("min", today);

            // Show warning if the selected date is in the past
            const dueDateInput = document.getElementById("due_date");
            const dateWarning = document.getElementById("dateWarning");

            dueDateInput.addEventListener("change", function() {
                if (dueDateInput.value < today) {
                    dateWarning.style.display = "block"; // Show the warning
                    dueDateInput.setCustomValidity("Please select a future date.");
                } else {
                    dateWarning.style.display = "none"; // Hide the warning
                    dueDateInput.setCustomValidity(""); // Reset custom validity
                }
            });
        });
    </script>
@endsection