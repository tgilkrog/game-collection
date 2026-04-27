export default function loginPopup() {
    const userIcon = document.querySelector('.login-popup');
    const loginForm = document.querySelector('.login-form');

    if (userIcon) {
        userIcon.addEventListener('click', function () {
            if (loginForm.style.display === 'block') {
                loginForm.style.display = 'none';
            } else {
                loginForm.style.display = 'block';
            }
        });
    }

    if (loginForm) {
        document.addEventListener('click', function(e) {
            if (!loginForm.contains(e.target) && !userIcon.contains(e.target)) {
                loginForm.style.display = "none";
            }
        });
    }
}