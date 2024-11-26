@extends('admin-subsystem.template.adminTemplate');

@section('css')
    @vite('resources/css/listStyle.css')
@endsection

@section('content')
<div>
    <button class="modal-btn" id="openModalBtn">Add class +</button>
    
    <h1 class="welcome-text">Class List</h1>

   <!-- Modal Structure -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-content">
      <h2>Add Parent</h2>
      <!-- Button to route to Add Manually -->
      <button class="modal-btn" onclick="location.href='{{route('add-class-manualy')}}'">Add Manually</button>
      <!-- Button to route to Add by Document -->
      <button class="modal-btn" onclick="location.href='{{route('add-class-document')}}'">Add by Document</button>
      <!-- Cancel Button -->
      <button class="modal-btn cancel-btn" id="closeModalBtn">Cancel</button>
    </div>
  </div>

<script>
    // Get modal elements
    const modalOverlay = document.getElementById('modalOverlay');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
        
     // Open modal
    openModalBtn.addEventListener('click', () => {
    modalOverlay.style.display = 'flex';
    });
        
    // Close modal
    closeModalBtn.addEventListener('click', () => {
    modalOverlay.style.display = 'none';
    });
        
    // Close modal when clicking outside the modal content
    modalOverlay.addEventListener('click', (event) => {
    if (event.target === modalOverlay) {
        modalOverlay.style.display = 'none';
      }
    });
</script>
</div>
@endsection