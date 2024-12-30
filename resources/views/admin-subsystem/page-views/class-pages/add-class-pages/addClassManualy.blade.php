@extends('admin-subsystem.template.adminTemplate');

@section('css')
    @vite('resources/css/addManualStyle.css')
@endsection

@section('content')
<div>
  <div class="add-teacher-container">
    <h1 class="add-teacher-heading">Add Class</h1>
    
    <form class="add-teacher-form" method="POST" action="{{ route('class-list.store') }}">
      @csrf
        <!-- Validation Errors -->
       <!-- @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif-->

      <!-- class Name Field -->
      <label for="classname" class="form-label">Class Name:</label>
      <input 
        type="classname" 
        id="classname" 
        name="classname" 
        class="form-input" 
        placeholder="Enter class name" 
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
      
      <!-- Buttons -->
      <div class="form-actions">
        <button type="submit" class="form-btn submit-btn">Add class</button>
        <button type="button" class="form-btn cancel-btn" onclick="location.href='{{ route('class-list') }}'">Cancel</button>
      </div>
    </form>
  </div>

</div>
@endsection