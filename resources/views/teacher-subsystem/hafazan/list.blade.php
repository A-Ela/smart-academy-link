@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Back Button -->
        <a href="{{ route('hafazan.create') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back 
        </a>

        <h2 class="mt-4">Student Recitations</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hafazan Assignments Table -->
        <div class="homework-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Surah</th>
                        <th>Ayah Number</th>
                        <th>Recite Date</th>
                        <th>Actions</th> <!-- Added Actions column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($hafazans as $hafazan)
                        <tr>
                            <td>{{ $hafazan->student->name }}</td>
                            <td>{{ $hafazan->surah_name }}</td>
                            <td>{{ $hafazan->ayah_number }}</td>
                            <td>{{ $hafazan->recite_date }}</td> <!-- Display Recite Date -->
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('hafazan.edit', $hafazan->id) }}" class="btn btn-edit btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <!-- Delete Button -->
                                <form action="{{ route('hafazan.destroy', $hafazan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td> <!-- Added actions column for edit/delete -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Custom Styling -->
    <style>
        .btn-back {
            background-color: cadetblue;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #545b62;
            color: white;
            text-decoration: none;
        }

        .homework-container {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 85%;
            margin: 20px auto;
        }

        .homework-container h2 {
            font-size: 2rem;
            color: #333;
        }

        .table {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table th, .table td {
            padding: 12px 15px;
            text-align: center;
            font-size: 1rem;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: cadetblue;
            color: white;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .btn {
            margin: 0 5px;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
        }

        .btn i {
            margin-right: 5px;
        }

        .btn-edit {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .btn-sm {
            padding: 5px 10px;
        }
    </style>

    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endsection
