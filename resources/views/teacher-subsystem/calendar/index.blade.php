@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Academic Calendar</h2>
        <div id="calendar"></div>
    </div>

    <!-- Include FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

    <!-- Include FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.min.js"></script>

    <!-- Initialize the FullCalendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Monthly calendar view
                events: @json($calendarEvents), // Load events from the controller
                eventClick: function(info) {
                    alert('Event: ' + info.event.title + '\n' + info.event.extendedProps.description);
                },
            });
            calendar.render();
        });
    </script>
@endsection
