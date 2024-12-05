setTimeout(function() {
    var errorMessages = document.querySelectorAll('.text-danger'); // Mengumpulkan semua elemen dengan kelas .error-message
    errorMessages.forEach(function(element) {
        element.style.display = 'none'; // Menyembunyikan setiap pesan error
    });
}, 3000);
