<!-- resources/views/students/index.blade.php -->

@extends('teacher-subsystem.layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Student List</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>IC No</th>
                    <th>Class</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->ic_no }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->year }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
