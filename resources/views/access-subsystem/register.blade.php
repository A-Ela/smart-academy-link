<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Smart Academy Link</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        <h2 style="color: black;">Register</h2>

        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-content button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="header">
            <h2>Register</h2>
        </div>

        <!-- Registration Form -->
        <form id="registerForm" action="{{ url('/register') }}" method="POST">
            @csrf <!-- CSRF Protection -->
            <!-- Full Name Field -->
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input 
                    type="text" 
                    id="full_name" 
                    name="full_name" 
                    aria-label="Enter your full name" 
                    placeholder="Enter your full name" 
                    required>
            </div>

            <!-- NRIC Field -->
            <div class="form-group">
                <label for="nric">NRIC:</label>
                <input 
                    type="text" 
                    id="nric" 
                    name="nric" 
                    pattern="\d{12}" 
                    title="Please enter a valid 12-digit NRIC number" 
                    aria-label="Enter your 12-digit NRIC number" 
                    placeholder="Enter your 12-digit NRIC" 
                    required>
            </div>

            <!-- Role Selection -->
            <div class="form-group">
                <label for="role">Role:</label>
                <select 
                    id="role" 
                    name="role" 
                    aria-label="Select your role" 
                    required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    aria-label="Enter your password" 
                    placeholder="Enter your password" 
                    required>
            </div>

            <!-- Submit Button -->
            <button type="submit">Register</button>
        </form>
    </div>

    <!-- Modal for Success Message -->
    <div id="successModal" class="modal" aria-live="polite">
        <div class="modal-content">
            <p>Successfully Registered!</p>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        // Handle form submission and show success modal
        document.getElementById("registerForm").onsubmit = function (event) {
            event.preventDefault(); // Prevent actual form submission
            document.getElementById("successModal").style.display = "flex"; // Show modal
        };

        // Function to close modal
        function closeModal() {
            document.getElementById("successModal").style.display = "none";
            window.location.href = "{{ url('/') }}"; // Redirect to homepage
        }
    </script>
</body>
</html>
