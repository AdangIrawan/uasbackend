var alertSuccess = document.getElementById('alert-success');

// Tampilkan pesan alert success dan hilangkan setelah 3 detik
if (alertSuccess) {
    alertSuccess.style.display = 'block';
    setTimeout(function () {
        alertSuccess.style.display = 'none';
    }, 3000); // Muncul selama 3 detik
}