<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/templatePage.css') <!-- default css -->
    @yield('css') <!-- specific css for each page -->
</head>

<body>
<div>
    <!-- Hamburger Menu Button for Small Screens -->
    <div class="hamburger-menu">
        <button id="hamburgerButton">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
    
  
    <!-- Include Sidebar Partial for Large Screens -->
    @include('admin-subsystem.partial-layouts.sidebar')

    <!-- Include Sidebar Partial for Mobile Screens -->
    @include('admin-subsystem.partial-layouts.sidebar-mobile')

    <!-- Main Content Area -->
    <div class="main-content">
        @yield('content')
    </div>
</div>

<!-- JavaScript for Toggling Mobile Sidebar -->
<script>
    // Select the hamburger button and the mobile sidebar
    const hamburgerButton = document.getElementById('hamburgerButton');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const body = document.body;

    // Add event listener to toggle the mobile sidebar
    hamburgerButton.addEventListener('click', () => {
        if (mobileSidebar.style.display === 'block') {
            mobileSidebar.style.display = 'none'; // Hide sidebar
        } else {
            mobileSidebar.style.display = 'block'; // Show sidebar
        }
    });

   // Close sidebar when clicking outside it
   document.addEventListener('click', (event) => {
        if (!mobileSidebar.contains(event.target) && event.target !== hamburgerButton) {
            mobileSidebar.style.display = 'none'; // Hide sidebar
        }
    });
</script>

</body>
</html>
