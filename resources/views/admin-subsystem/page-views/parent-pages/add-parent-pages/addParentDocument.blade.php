@extends('admin-subsystem.template.adminTemplate');

@section('css')
    @vite('resources/css/addDocumentStyle.css')
@endsection

@section('content')
<div class="container">
    <h1>Import Parent Data</h1>
    <p>Please upload your Excel file to import Parent data.</p>
    
    <!-- Form for importing an Excel file -->
    <form action="{{ route('parent-list.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- File Input -->
        <div>
            <label for="file" class="block text-lg font-medium">Choose Excel File:</label>
            <input type="file" name="file" id="file" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Import Parent</button>
        </div>
    </form>

    <!-- Success or Error message -->
    @if (session('success'))
        <div class="mt-4 p-4 bg-green-100 text-green-800 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-4 p-4 bg-red-100 text-red-800 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection