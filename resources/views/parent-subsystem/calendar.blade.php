<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Events Calendar</title>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #bde0fe;
        }
        .sidebar {
            position: fixed;
            width: 20%;
            height: 100%;
            background-color: #3083dc;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 10px;
            background-color: #1865bb;
            margin: 10px 0;
            text-align: center;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #0d4b94;
        }
        .main {
            margin-left: 20%;
            padding: 20px;
        }
        .main h1 {
            text-align: center;
            color: #1167b1;
            margin-bottom: 20px;
        }
        #calendar {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="{{ route('parent-dashboard') }}">Back to Dashboard</a>
    </div>
    <div class="main">
        <h1>School Events Calendar</h1>
        <div id="calendar"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    {
                        title: 'Sports Day',
                        start: '2024-12-01',
                        description: 'Join us for a fun-filled sports day!'
                    },
                    {
                        title: 'Parent-Teacher Meeting',
                        start: '2024-12-05',
                        description: 'Meet with teachers to discuss student progress.'
                    },
                    {
                        title: 'Art Exhibition',
                        start: '2024-12-15',
                        description: 'Showcase of student artwork.'
                    }
                ],
                eventClick: function(info) {
                    alert(
                        `Event: ${info.event.title}\nDescription: ${info.event.extendedProps.description}`
                    );
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>
