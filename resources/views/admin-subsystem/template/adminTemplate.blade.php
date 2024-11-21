<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

<div>
    <!-- Hamburger Menu Button for Small Screens -->
    <div class="lg:hidden p-4">
        <button id="hamburgerButton" class="text-gray-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Include Sidebar Partial for Large Screens -->
    @include('admin-subsystem.partial-layouts.sidebar')

    <!-- Include Sidebar Partial for Mobile Screens -->
    @include('admin-subsystem.partial-layouts.sidebar-mobile')

    <!-- Main Content Area -->
    <div class="lg:ml-64 p-5">
        @yield('content')
    </div>
</div>

<!-- JavaScript for Toggling Mobile Sidebar -->
<script>
    // Select the hamburger button and the mobile sidebar
    const hamburgerButton = document.getElementById('hamburgerButton');
    const mobileSidebar = document.getElementById('mobileSidebar');

    // Add event listener to toggle the mobile sidebar
    hamburgerButton.addEventListener('click', () => {
        if (mobileSidebar.style.display === 'block') {
            mobileSidebar.style.display = 'none'; // Hide sidebar
        } else {
            mobileSidebar.style.display = 'block'; // Show sidebar
        }
    });
</script>

</body>
</html>
