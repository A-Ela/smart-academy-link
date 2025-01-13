<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #d6e9f9;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .navigation {
            background-color: #007bff;
            color: white;
            width: 20%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .navigation img {
            width: 100px;
            margin-bottom: 20px;
        }
        .navigation h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .navigation a {
            text-decoration: none;
            width: 100%;
        }
        .navigation button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 10px 0;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            text-align: left;
            border-radius: 5px;
        }
        .navigation button:hover {
            background-color: #003f7f;
        }
        .content {
            flex: 1;
            padding: 40px;
            text-align: center;
        }
        h1 {
            color: #004085;
            margin-bottom: 30px;
        }
        .student-button {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            color: #333;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .student-button:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <img src="{{ asset('Images/school_logo.png') }}" alt="School Logo">
            <h2>Quick Navigation</h2>
            <a href="/events"><button>Events</button></a>
            <a href="/notifications"><button>Notifications</button></a>
            <a href="/calendar"><button>Calendar</button></a>
            <a href="/class-telegram-links"><button>Telegram Links</button></a>
        </div>
        <div class="content">
            <h1>Welcome to the Parent Dashboard</h1>
            <button class="student-button" onclick="window.location.href='/student-performance/minah-binti-abu'">
                Minah binti Abu
            </button>
        </div>
    </div>
</body>
</html>
