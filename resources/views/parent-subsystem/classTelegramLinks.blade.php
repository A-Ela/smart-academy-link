<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Telegram Links</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #bde0fe; /* Match the Parent Dashboard background */
        }
        .container {
            padding: 20px;
            text-align: center;
        }
        .logo {
            text-align: center;
            margin: 20px 0;
        }
        .logo img {
            max-width: 150px;
            height: auto;
        }
        h1 {
            color: #1167b1;
            margin-bottom: 30px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        .class-link {
            margin: 15px 0;
            font-size: 18px;
        }
        a {
            color: #1167b1;
            text-decoration: underline;
            font-weight: bold;
        }
        .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #1167b1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .back-button:hover {
            background-color: #0d4b94;
        }
    </style>
</head>
<body>
    <!-- School Logo -->
    <div class="logo">
        <img src="{{ asset('Images/school_logo.png') }}" alt="School Logo">
    </div>

    <!-- Page Container -->
    <div class="container">
        <h1>Class Telegram Links</h1>
        <!-- Quick Navigation -->
        <a href="{{ route('parent-dashboard') }}" class="back-button">Back to Dashboard</a>

        <!-- List of Telegram Links -->
        <ul>
            @foreach($classLinks as $link)
                <li class="class-link">
                    {{ $link['class'] }}: <a href="{{ $link['link'] }}" target="_blank">Join Telegram Group</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
