document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        successAlert.style.display = 'block'; // Show the alert
        setTimeout(() => {
            successAlert.style.display = 'none'; // Hide the alert after 3 seconds
        }, 3000);
    }
});
