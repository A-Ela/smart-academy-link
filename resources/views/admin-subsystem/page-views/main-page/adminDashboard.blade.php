@extends('admin-subsystem.template.adminTemplate')

@section('css')
    @vite('resources/css/dashboardOptions.css')
@endsection

@section('content')
<div>
    <h1 class="welcome-text">Welcome, Admin!</h1>
    <ul class="list-options">
        <li>
            <a href="{{route('class-selector')}}">
                <div class="option-box">
                    <span>Student List</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{route('teacher-list')}}">
                <div class="option-box">
                    <span>Teacher List</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{route('class-list')}}">
                <div class="option-box">
                    <span>Class List</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{route('parent-list')}}">
                <div class="option-box">
                    <span>Parents List</span>
                </div>
            </a>
        </li>
    </ul>    
</div>
@endsection
