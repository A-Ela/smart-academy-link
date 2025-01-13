<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #d6e9f9;
            text-align: center;
        }
        header {
            padding: 20px;
        }
        header img {
            width: 100px;
            margin-bottom: 10px;
        }
        h1 {
            color: #004085;
            font-size: 24px;
        }
        nav {
            margin-top: 20px;
        }
        .menu-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 5px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .menu-button:hover {
            background-color: #0056b3;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            margin: 10px 0;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .back-to-dashboard {
            background-color: grey;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
        }
        .back-to-dashboard:hover {
            background-color: #505050;
        }
    </style>
</head>
<body>
    <header>
        <img src="/images/school_logo.png" alt="School Logo">
        <h1>Performance of Minah binti Abu</h1>
    </header>
    <nav>
        <div class="dropdown">
            <button class="menu-button" onclick="toggleDropdown('academic-dropdown')">Academic</button>
            <div class="dropdown-content" id="academic-dropdown">
                <a href="{{ route('academic-progress', ['year' => 1]) }}">Year 1</a>
                <a href="{{ route('academic-progress', ['year' => 2]) }}">Year 2</a>
                <a href="{{ route('academic-progress', ['year' => 3]) }}">Year 3</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="menu-button" onclick="toggleDropdown('diniyyah-dropdown')">Diniyyah</button>
            <div class="dropdown-content" id="diniyyah-dropdown">
                <a href="{{ route('diniyyah-progress', ['year' => 1]) }}">Year 1</a>
                <a href="{{ route('diniyyah-progress', ['year' => 2]) }}">Year 2</a>
                <a href="{{ route('diniyyah-progress', ['year' => 3]) }}">Year 3</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="menu-button" onclick="toggleDropdown('tarbiah-dropdown')">Tarbiah</button>
            <div class="dropdown-content" id="tarbiah-dropdown">
                <a href="{{ route('tarbiah-progress', ['year' => 1]) }}">Year 1</a>
                <a href="{{ route('tarbiah-progress', ['year' => 2]) }}">Year 2</a>
                <a href="{{ route('tarbiah-progress', ['year' => 3]) }}">Year 3</a>
            </div>
        </div>
        <a href="{{ route('parent-dashboard') }}" class="back-to-dashboard">Back to Dashboard</a>
    </nav>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const isDisplayed = dropdown.style.display === 'block';
            // Close all dropdowns
            document.querySelectorAll('.dropdown-content').forEach(el => el.style.display = 'none');
            // Toggle the selected dropdown
            dropdown.style.display = isDisplayed ? 'none' : 'block';
        }

        // Close dropdowns if clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-content').forEach(el => el.style.display = 'none');
            }
        });
    </script>
</body>
</html>
