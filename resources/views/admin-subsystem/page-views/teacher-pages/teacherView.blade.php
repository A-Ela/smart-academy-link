@extends('admin-subsystem.template.adminTemplate')

@section('css')
    @vite('resources/css/addManualStyle.css')
@endsection

@section('content')
<div>
   <h1 class="text-3xl font-bold mb-4">{{ $teacher->teacherName }}'s Profile</h1>

        <div class="profile-details">
            <p><strong>Username:</strong> {{ $teacher->username }}</p>
            <p><strong>Email:</strong> {{ $teacher->email }}</p>
            <p><strong>Phone:</strong> {{ $teacher->phone }}</p>
            <p><strong>Address:</strong> {{ $teacher->address }}</p>
        </div>

    <a href="{{ route('teacher-list') }}" class="mt-4 inline-block bg-blue-500 text-white p-2 rounded">Back to Teachers List</a>
</div>
@endsection