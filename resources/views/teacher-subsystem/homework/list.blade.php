@extends('teacher-subsystem.layouts.app')

@section('content')
    <div class="homework-container">
        <h2 class="text-center mb-4">Homework List</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Subject Name</th>
                        <th>Class ID</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($homeworks as $homework)
                        <tr>
                            <td>{{ $homework->subject_name }}</td>
                            <td>{{ $homework->class_id }}</td>
                            <td>{{ $homework->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($homework->due_date)->format('M d, Y') }}</td>
                            <td class="text-center">
                                <!-- Edit Button -->
                                <a href="{{ route('homework.edit', $homework->id) }}" class="btn btn-sm btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('homework.destroy', $homework->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Custom Styling -->
    <style>
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
            background-color:cadetblue;
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
