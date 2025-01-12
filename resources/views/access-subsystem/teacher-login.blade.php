<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="login-container">
        <h2>Teacher Login</h2>
        <form action="{{ url('/process-login') }}" method="POST">
            @csrf <!-- Laravel CSRF protection -->
            <div class="form-group">
                <label for="username">Username (NRIC):</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>

            <a href="javascript:void(0)" id="forgotPasswordLink">Forgot Password?</a>

<!-- Modal -->
<div id="forgotPasswordModal" class="modal hidden">
    <div class="modal-content">
        <h2>Reset Password</h2>
        <p>Enter your email address to reset your password. When you receive the email, click the link inside to complete the password reset.</p>
        <form method="POST" action="{{ url('/password/reset') }}">
            @csrf
            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
                style="width: 100%; padding: 10px; margin: 15px 0; border: 1px solid #ccc; border-radius: 5px;"
            />
            <button type="submit" style="width: 100%; padding: 10px; background-color: #333; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
                Request Reset Password
            </button>
        </form>
        <button id="closeModalButton" style="margin-top: 10px; background-color: #555; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Close</button>
    </div>
</div>


    <script>
        // JavaScript for Modal Behavior
        document.addEventListener('DOMContentLoaded', function () {
            const forgotPasswordLink = document.getElementById('forgotPasswordLink');
            const forgotPasswordModal = document.getElementById('forgotPasswordModal');
            const closeModalButton = document.getElementById('closeModalButton');

            // Show Modal
            forgotPasswordLink.addEventListener('click', function () {
                forgotPasswordModal.classList.remove('hidden');
            });

            // Close Modal
            closeModalButton.addEventListener('click', function () {
                forgotPasswordModal.classList.add('hidden');
            });

            // Close Modal on Outside Click
            window.addEventListener('click', function (event) {
                if (event.target === forgotPasswordModal) {
                    forgotPasswordModal.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
