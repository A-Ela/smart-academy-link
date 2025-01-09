<!-- resources/views/events/create.blade.php -->
@extends('teacher-subsystem.layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Flex container for the Create Event section and View Events List button -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; width: 100%;">
            <h2 style="margin-right: auto;">Create Event</h2>
            <a href="{{ route('events.index') }}" class="btn btn-view">
                <i class="fas fa-eye"></i> View Events List
            </a>
        </div>

        <!-- Create Event Form -->
        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Event Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>

            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" name="event_date" class="form-control" id="event_date" required>
                <small id="dateWarning" class="form-text text-muted" style="display: none; color: red;">
                    Please select a future date for the event.
                </small>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Event</button>
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

        /* Custom styles for the View Events List button */
        .btn-view {
            background-color: #17a2b8; /* Bootstrap's info color */
            border-color: #17a2b8;
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px; /* Space between the icon and text */
            font-size: 0.9rem; /* Adjust button text size */
            padding: 0.5rem 1rem; /* Adjust button padding */
            text-decoration: none; /* Remove underline */
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
            document.getElementById("event_date").setAttribute("min", today);

            // Show warning if the selected date is in the past
            const eventDateInput = document.getElementById("event_date");
            const dateWarning = document.getElementById("dateWarning");

            eventDateInput.addEventListener("change", function() {
                if (eventDateInput.value < today) {
                    dateWarning.style.display = "block"; // Show the warning
                    eventDateInput.setCustomValidity("Please select a future date.");
                } else {
                    dateWarning.style.display = "none"; // Hide the warning
                    eventDateInput.setCustomValidity(""); // Reset custom validity
                }
            });
        });
    </script>
@endsection



