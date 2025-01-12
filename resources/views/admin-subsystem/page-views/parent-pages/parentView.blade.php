@extends('admin-subsystem.template.adminTemplate')

@section('css')
    @vite('resources/css/addManualStyle.css')
@endsection

@section('content')
<div>
   <h1 class="text-3xl font-bold mb-4">{{ $parent->name }}'s Profile</h1>

        <div class="profile-details">
            <p><strong>Username:</strong> {{ $parent->username }}</p>
            <p><strong>Email:</strong> {{ $parent->email }}</p>
            <p><strong>Phone:</strong> {{ $parent->phone }}</p>
            <p><strong>Address:</strong> {{ $parent->address }}</p>
        </div>

    <a href="{{ route('parent-list') }}" class="mt-4 inline-block bg-blue-500 text-white p-2 rounded">Back to Parents List</a>
</div>
@endsection