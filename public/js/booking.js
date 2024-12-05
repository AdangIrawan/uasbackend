// Ambil elemen pesan alert
var alertSuccess = document.getElementById('alert-success');
var alertError = document.getElementById('alert-error');

// Tampilkan pesan alert
if (alertSuccess) {
    alertSuccess.style.display = 'block';
    setTimeout(function () {
        alertSuccess.style.display = 'none';
    }, 3000); // Muncul selama 3 detik
}

if (alertError) {
    alertError.style.display = 'block';
    setTimeout(function () {
        alertError.style.display = 'none';
    }, 3000); // Muncul selama 3 detik
}