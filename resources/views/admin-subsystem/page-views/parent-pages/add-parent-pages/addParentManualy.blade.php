@extends('admin-subsystem.template.adminTemplate')

@section('css')
    @vite('resources/css/addManualStyle.css')
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

      <!-- Username Field -->
      <label for="username" class="form-label">Username:</label>
      <input 
        type="text" 
        id="username" 
        name="username" 
        class="form-input" 
        placeholder="Enter parent's username" 
        required>

      <!-- Parent Name Field -->
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
      
      <!-- Children Field -->
      <label for="children" class="form-label">Children:</label>
      <select 
        id="children" 
        name="student_ids[]" 
        class="form-input select2" 
        multiple 
        required>
        @foreach ($students as $student)
          <option value="{{ $student->studentID }}">{{ $student->name }}</option>
        @endforeach
      </select>

      <!-- Buttons -->
      <div class="form-actions">
        <button type="submit" class="form-btn submit-btn">Add Parent</button>
        <button type="button" class="form-btn cancel-btn" onclick="location.href='{{ route('parent-list') }}'">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Include jQuery and Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select students",
            allowClear: true,
            ajax: {
                url: '{{ route('students.search') }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.studentID
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });
</script>
@endsection