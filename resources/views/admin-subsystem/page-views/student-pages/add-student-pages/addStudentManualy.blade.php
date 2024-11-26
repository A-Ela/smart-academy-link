@extends('admin-subsystem.template.adminTemplate');

@section('css')
    @vite('resources/css/addManualStyle.css')
@endsection

@section('content')
<div>
  <div class="add-teacher-container">
    <h1 class="add-teacher-heading">Add Student</h1>
    
    <form class="add-teacher-form" method="POST" action="{{ route('student-list.store') }}">
      @csrf
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <!-- student Name Field -->
      <label for="name" class="form-label">Name:</label>
      <input 
        type="text" 
        id="name" 
        name="name" 
        class="form-input" 
        placeholder="Enter Student's name" 
        required>
      
      <!-- year Field -->
      <label for="year" class="form-label">Year:</label>
      <input 
        type="year" 
        id="year" 
        name="year" 
        class="form-input" 
        placeholder="Enter Year" 
        required>
      
      <!-- classname Field -->
      <label for="classname" class="form-label">class name:</label>
      <input 
        type="classname" 
        id="classname" 
        name="classname" 
        class="form-input" 
        placeholder="Enter class name of student" 
        required>

        <!-- classname Field -->
      <label for="classname" class="form-label">class name:</label>
      <input 
        type="classname" 
        id="classname" 
        name="classname" 
        class="form-input" 
        placeholder="Enter class name of student" 
        required>

        <!-- classID Field -->
      <label for="classID" class="form-label">class ID:</label>
      <input 
        type="classID" 
        id="classID" 
        name="classID" 
        class="form-input" 
        placeholder="Enter class ID of student" 
        required>
      
      <!-- Buttons -->
      <div class="form-actions">
        <button type="submit" class="form-btn submit-btn">Add Student</button>
        <button type="button" class="form-btn cancel-btn" onclick="location.href='{{ route('student-list') }}'">Cancel</button>
      </div>
    </form>
  </div>

</div>
@endsection