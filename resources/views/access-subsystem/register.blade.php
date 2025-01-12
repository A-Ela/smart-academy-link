<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Smart Academy Link</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="register-container">
        <div class="header">
            <h2>Contact the School for Registration</h2>
        </div>
        <p>If you need to register, please contact the school administration. Provide your contact information below, and we will get in touch with you.</p>
        <form action="{{ url('/contact-school') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="contact_info">Contact Information:</label>
                <textarea id="contact_info" name="contact_info" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
        <p>For more information, visit our <a href="{{ url('/contact-info') }}">Contact Information</a> page.</p>
    </div>
</body>
</html>
