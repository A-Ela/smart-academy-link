@extends('admin-subsystem.template.adminTemplate');

@section('css')
    @vite('resources/css/addManualStyle.css')
@endsection

@section('content')
<div>
  <div class="add-teacher-container">
    <h1 class="add-teacher-heading">Add Parent</h1>
    
    <form class="add-teacher-form" method="POST" action="{{ route('parent-list.store') }}">
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

      <!-- parent Name Field -->
      <label for="name" class="form-label">Name:</label>
      <input 
        type="text" 
        id="name" 
        name="name" 
        class="form-input" 
        placeholder="Enter parent's name" 
        required>
      
      <!-- Email Field -->
      <label for="email" class="form-label">Email:</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        class="form-input" 
        placeholder="Enter email address" 
        required>
      
      <!-- Password Field -->
      <label for="password" class="form-label">Password:</label>
      <input 
        type="password" 
        id="password" 
        name="password" 
        class="form-input" 
        placeholder="Enter a password" 
        required>
      
      <!--  children field  -->
      

      <!-- Buttons -->
      <div class="form-actions">
        <button type="submit" class="form-btn submit-btn">Add Parent</button>
        <button type="button" class="form-btn cancel-btn" onclick="location.href='{{ route('parent-list') }}'">Cancel</button>
      </div>
    </form>
  </div>

</div>
@endsection