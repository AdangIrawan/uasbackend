function showAlert(message) {
    const alertBox = document.createElement('div');
    alertBox.className = 'alert show';
    alertBox.innerText = message;

    document.body.appendChild(alertBox);

    setTimeout(() => {
        alertBox.classList.remove('show');
        alertBox.remove();
    }, 3000);
}