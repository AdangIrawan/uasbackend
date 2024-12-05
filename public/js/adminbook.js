// Ambil elemen pesan alert
document.addEventListener('DOMContentLoaded', function () {
    // Success alert handling
    const successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        setTimeout(function () {
            successAlert.style.display = 'none';
        }, 3000); // Hide after 3 seconds
    }

    // Error alert handling
    const errorAlert = document.querySelector('.alert-danger');
    if (errorAlert) {
        setTimeout(function () {
            errorAlert.style.display = 'none';
        }, 3000); // Hide after 3 seconds
    }
});
