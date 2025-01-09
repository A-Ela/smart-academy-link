@extends('teacher-subsystem.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Academic Calendar</h2>
    <div id="calendar"></div>
</div>

<!-- Include FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

<!-- Include FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Default view as month
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay' // Views for month, week, and day
            },
            events: @json($events), // Pass Laravel events data to FullCalendar
        });

        calendar.render(); // Render the calendar
    });
</script>

<style>
    #calendar {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection



