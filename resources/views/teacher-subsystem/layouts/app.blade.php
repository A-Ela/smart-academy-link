<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #53b1a6;  /* Green color for the top part */
            background-image: url('{{ asset('images/your_image_name.jpg') }}');  /* Path to the image in the public directory */
            background-size: cover;
            padding: 20px;
            color: white;
            height: 100vh;
            background-position: center;
        }

        .logo-container {
            text-align: center; /* Center the logo horizontally */
            margin-bottom: 20px; /* Add some space below the logo */
        }

        .logo-container img {
            max-width: 200px; /* Set a maximum width for the logo */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px; /* Optional: Add rounded corners */
            display: inline-block;
        }

        .sidebar h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
            padding: 10px;
            background-color: rgba(88, 195, 177, 0.8);  /* Semi-transparent background for the links */
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #47a094;
        }

        .dropdown-menu {
            display: none;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dropdown-menu li {
            margin: 5px 0;
        }

        .dropdown-menu a {
            text-decoration: none;
            padding: 5px 10px;
            display: block;
            color: white;
            background-color: rgba(88, 195, 177, 0.8);
            border-radius: 5px;
        }

        .dropdown-menu a:hover {
            background-color: #47a094;
        }

        /* Content Area Styling */
        .content {
            padding: 20px;
            flex-grow: 1;
            background: linear-gradient(to bottom right, #f0f4f8, #e8f5e9); /* Light gradient */
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .content-box {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 90%;
            max-width: 800px;
        }

        .content-box h1 {
            font-size: 2em;
            color: #53b1a6;
            text-align: center;
            margin-bottom: 20px;
        }

        .content-box p {
            font-size: 1.2em;
            text-align: center;
            color: #555;
        }

        .decorative-circle {
            position: absolute;
            width: 150px;
            height: 150px;
            background: #53b1a6;
            border-radius: 50%;
            top: 10%;
            left: 10%;
            opacity: 0.2;
        }

        .decorative-rectangle {
            position: absolute;
            width: 200px;
            height: 100px;
            background: #47a094;
            top: 70%;
            right: 10%;
            transform: rotate(-10deg);
            opacity: 0.3;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <!-- Add the school logo here -->
        <div class="logo-container">
            <img src="{{ asset('images/school_logo.png') }}" alt="School Logo">
        </div>
        <h2>MENU</h2>
        <!-- Sidebar Menu Options -->
        <a href="{{ url('/homework/create') }}">Create Homework</a>
        <a href="{{ route('homework.list') }}">View Homework List</a>
        <a href="{{ route('events.create') }}" class="nav-link">Events</a>
        <a href="{{ url('/notifications') }}">Notification</a>
        <a href="{{ url('/students') }}">Students List</a>
        <a href="{{ route('calendar.index') }}">Calendar</a>

        <!-- New Progress Dropdown -->
       <!-- Sidebar Progress Dropdown -->
<ul>
    <li class="dropdown">
        <a href="#" onclick="toggleDropdown('progressDropdown')">Report Card</a>
        <ul id="progressDropdown" class="dropdown-menu">
            
            <!-- Check if $student is available -->
            @isset($student)
                <li><a href="{{ route('academic.grade', $student->id) }}">Academic Progress</a></li>
                <li><a href="{{ route('diniyyah.grade', $student->id) }}">Diniyyah Progress</a></li>
                <li><a href="{{ route('tarbiah.grade', $student->id) }}">Tarbiah Progress</a></li>
            @else
                <li><a href="{{ route('academic.grade', 1) }}">Academic Progress</a></li> <!-- Default value -->
                <li><a href="{{ route('diniyyah.grade', 1) }}">Diniyyah Progress</a></li> <!-- Default value -->
                <li><a href="{{ route('tarbiah.grade', 1) }}">Tarbiah Progress</a></li> <!-- Default value -->
            @endisset
        </ul>
    </li>
</ul>
    </div>
    <div class="content">
        <!-- Add decorative shapes -->
        <div class="decorative-circle"></div>
        <div class="decorative-rectangle"></div>
        
        <!-- Content Area Box -->
        <div class="content-box">
            @yield('content') <!-- Dynamically inject content -->
        </div>
    </div>

    <script>
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }
    </script>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>
</body>
</html>

