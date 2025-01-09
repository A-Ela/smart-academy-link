@extends('teacher-subsystem.layouts.app')

@section('content')
    <header>
        <h1>Performance of Minah binti Abu</h1>
    </header>
    <div class="menu">
        <!-- Academic Dropdown -->
        <div class="menu-item">
            <button class="menu-button" onclick="toggleDropdown('academicDropdown')">Academic</button>
            <div class="dropdown" id="academicDropdown">
                <a href="/academic/year/1">Year 1</a>
                <a href="/academic/year/2">Year 2</a>
                <a href="/academic/year/3">Year 3</a>
                <a href="/academic/year/4">Year 4</a>
                <a href="/academic/year/5">Year 5</a>
                <a href="/academic/year/6">Year 6</a>
            </div>
        </div>

        <!-- Diniyyah Dropdown -->
        <div class="menu-item">
            <button class="menu-button" onclick="toggleDropdown('diniyyahDropdown')">Diniyyah</button>
            <div class="dropdown" id="diniyyahDropdown">
                <a href="/diniyyah/year/1">Year 1</a>
                <a href="/diniyyah/year/2">Year 2</a>
                <a href="/diniyyah/year/3">Year 3</a>
                <a href="/diniyyah/year/4">Year 4</a>
                <a href="/diniyyah/year/5">Year 5</a>
                <a href="/diniyyah/year/6">Year 6</a>
            </div>
        </div>

        <!-- Tarbiah Dropdown -->
        <div class="menu-item">
            <button class="menu-button" onclick="toggleDropdown('tarbiahDropdown')">Tarbiah</button>
            <div class="dropdown" id="tarbiahDropdown">
                <a href="/tarbiah/year/1">Year 1</a>
                <a href="/tarbiah/year/2">Year 2</a>
                <a href="/tarbiah/year/3">Year 3</a>
                <a href="/tarbiah/year/4">Year 4</a>
                <a href="/tarbiah/year/5">Year 5</a>
                <a href="/tarbiah/year/6">Year 6</a>
            </div>
        </div>
    </div>
    <h1>Performance Progress</h1>
    <!-- Content for Performance -->
@endsection

<script>
    function toggleDropdown(dropdownId) {
        // Close all open dropdowns
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            if (dropdown.id !== dropdownId) {
                dropdown.style.display = 'none';
            }
        });

        // Toggle the clicked dropdown
        const dropdown = document.getElementById(dropdownId);
        if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
        } else {
            dropdown.style.display = 'block';
        }
    }

    // Close dropdowns if clicking outside
    document.addEventListener('click', function (event) {
        const isDropdown = event.target.closest('.menu-item');
        if (!isDropdown) {
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.style.display = 'none';
            });
        }
    });
</script>
