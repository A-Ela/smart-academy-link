

document.addEventListener('DOMContentLoaded', function () {
    const userOptions = document.querySelectorAll('.user-card');
    const forgotPasswordContainer = document.getElementById('forgotPasswordContainer');
    const forgotPasswordModal = document.getElementById('forgotPasswordModal');
    const closeModalButton = document.getElementById('closeModalButton');

    // Hide Forgot Password link by default
    forgotPasswordContainer.classList.add('hidden');

    // Show Forgot Password link on user option click
    userOptions.forEach(option => {
        option.onclick = function () {
            forgotPasswordContainer.classList.remove('hidden');
            forgotPasswordContainer.classList.add('visible');
        };
    });

    // Show the forgot password modal when the link is clicked
    document.getElementById('forgotPasswordLink').onclick = function () {
        forgotPasswordModal.style.display = 'block';
    };

    // Close the modal when clicking on the close button
    closeModalButton.onclick = function () {
        forgotPasswordModal.style.display = 'none';
    };

    // Close the modal when clicking outside of it
    window.onclick = function (event) {
        if (event.target === forgotPasswordModal) {
            forgotPasswordModal.style.display = 'none';
        }
    };

    document.addEventListener('DOMContentLoaded', function () {
        // Show the forgot password modal
        document.getElementById('forgotPasswordLink').onclick = function () {
            document.getElementById('forgotPasswordModal').classList.remove('hidden');
        };
    
        // Close the modal when clicking on the close button
        document.getElementById('closeModalButton').onclick = function () {
            document.getElementById('forgotPasswordModal').classList.add('hidden');
        };
    
        // Close the modal when clicking outside the modal
        window.onclick = function (event) {
            const modal = document.getElementById('forgotPasswordModal');
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        };
    });
    
});
