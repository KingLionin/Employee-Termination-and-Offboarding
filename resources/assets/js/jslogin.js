document.addEventListener('DOMContentLoaded', function () {

    const passwordInputs = document.querySelectorAll('#password, #passwordNew, #passwordConfirm');
    const eyeIcons = document.querySelectorAll('#eyeIcon, #eyeIconNew, #eyeIconConfirm');

    eyeIcons.forEach((eyeIcon, index) => {
        eyeIcon.addEventListener('click', function () {
            const passwordInput = passwordInputs[index];
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<i class="bi bi-eye-fill"></i>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
            }
        });
    });
});