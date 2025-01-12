<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Academy Link</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>SAL System</h2>
            <br>
            <img src="{{ asset('images/school_logo.png') }}" alt="School Logo" class="logo">
            <h1>Selamat Datang!</h1>
            <h2><i>Welcome!</i></h2>
        </div>
        <div class="user-options">
            <div class="user-card" onclick="navigateToPage('{{ url('/student-login') }}')">
                <img src="{{ asset('images/student-icon.png') }}" alt="Student Icon">
                <p>STUDENT</p>
            </div>
            <div class="user-card" onclick="navigateToPage('{{ url('/teacher-login') }}')">
                <img src="{{ asset('images/teacher-icon.png') }}" alt="Teacher Icon">
                <p>TEACHER</p>
            </div>
            <div class="user-card" onclick="navigateToPage('{{ url('/admin-login') }}')">
                <img src="{{ asset('images/admin-icon.png') }}" alt="Admin Icon">
                <p>ADMIN</p>
            </div>
        </div>

        <p class="toggle-link">
            <button id="show-register" type="button" onclick="window.location.href='{{ url('/register') }}'">First Time Login? Register here</button>
        </p>
        
        <footer>
            <p>Copyright © 2024 - ByteBites</p>
        </footer>
    </div>

    <script>
        function navigateToPage(target) {
            try {
                window.location.href = target; // Navigate directly to the page
            } catch (error) {
                console.error("Navigation failed:", error);
                alert("Failed to navigate. Please try again later.");
            }
        }
    </script>
</body>
</html>
