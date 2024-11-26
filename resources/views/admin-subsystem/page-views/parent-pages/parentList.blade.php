@extends('admin-subsystem.template.adminTemplate');

@section('css')
    @vite('resources/css/listStyle.css')
@endsection

@section('content')
<div>
    <button class="modal-btn" id="openModalBtn">Add Parent +</button>
    <h1 class="welcome-text">Parents List</h1>
        
        <div class="teacher-list">
            <ul class="space-y-4">
                @foreach($parent as $parent)
                    <li class="flex justify-between items-center p-4 bg-gray-100 rounded-md shadow">
                        <span class="text-lg font-medium">{{ $parent->name }}</span>
                        <a href="{{ route('parents.show', $parent->id) }}" class="btn btn-primary">View Profile</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $parent->links() }}  <!-- Laravel's built-in pagination links -->
        </div>

     <!-- Modal Structure -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-content">
      <h2>Add Parent</h2>
      <!-- Button to route to Add Manually -->
      <button class="modal-btn" onclick="location.href='{{route('add-parent-manualy')}}'">Add Manually</button>
      <!-- Button to route to Add by Document -->
      <button class="modal-btn" onclick="location.href='{{route('add-parent-document')}}'">Add by Document</button>
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