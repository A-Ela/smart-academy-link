<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Events</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #bde0fe; /* Light blue from Parent Dashboard */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; /* White background for cards */
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #1167b1; /* Blue from Parent Dashboard */
        }

        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 120px;
            height: auto;
            border-radius: 50%;
        }

        .event-card {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            background-color: #f0f8ff; /* Slightly off-white blue */
            border: 1px solid #cce5ff; /* Light blue border */
        }

        .event-card h3 {
            margin: 0;
            color: #1167b1; /* Same blue color */
        }

        .event-card p {
            margin: 5px 0;
            color: #333333;
        }

        .event-card p span {
            font-weight: bold;
            color: #0d47a1; /* Dark blue for emphasis */
        }

        a.back-button {
            display: block;
            text-align: center;
            margin: 20px auto;
            padding: 10px 20px;
            width: 150px;
            color: white;
            background-color: #3083dc;
            text-decoration: none;
            border-radius: 5px;
        }

        a.back-button:hover {
            background-color: #1865bb; /* Hover color */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('Images/school_logo.png') }}" alt="School Logo">
        </div>

        <h1 class="header">School Events</h1>

        <div class="event-card">
            <h3>Sports Day</h3>
            <p><span>Date:</span> 2024-12-01</p>
            <p><span>Location:</span> School Field</p>
            <p>Join us for a fun-filled day of sports activities and competitions!</p>
        </div>

        <div class="event-card">
            <h3>Parent-Teacher Meeting</h3>
            <p><span>Date:</span> 2024-12-05</p>
            <p><span>Location:</span> Main Hall</p>
            <p>An opportunity for parents to meet teachers and discuss their children's progress.</p>
        </div>

        <div class="event-card">
            <h3>Art Exhibition</h3>
            <p><span>Date:</span> 2024-12-15</p>
            <p><span>Location:</span> Art Gallery</p>
            <p>Explore the amazing artwork created by our talented students.</p>
        </div>

        <a href="/parent-dashboard" class="back-button">Back to Dashboard</a>
    </div>
</body>
</html>
