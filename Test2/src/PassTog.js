const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#id_password');

togglePassword.addEventListener('click', function (e) {
    // Toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Toggle the eye icon classes
    if (togglePassword.classList.contains('bx-show')) {
        togglePassword.classList.remove('bx-show');
        togglePassword.classList.add('bx-hide');
    } else {
        togglePassword.classList.remove('bx-hide');
        togglePassword.classList.add('bx-show');
    }
});
