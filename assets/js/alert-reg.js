document.querySelector('form').addEventListener('submit', function (e) {
    var pass = document.getElementById('newPassword').value;
    var confirm = document.getElementById('passwordConfirm').value;
    var alertBox = document.getElementById('passwordAlert');
    if (pass !== confirm) {
        e.preventDefault();
        alertBox.classList.remove('d-none');
    } else {
        alertBox.classList.add('d-none');
    }
});