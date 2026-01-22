document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector('form');

    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const username = loginForm.querySelector('input[name="username"]').value;
            const password = loginForm.querySelector('input[name="password"]').value;
            const errorMsg = document.getElementById('error-msg');

            fetch('api/auth.php?action=login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ username: username, password: password })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'admin.php';
                } else {
                    if(errorMsg) errorMsg.innerText = data.message;
                    loginForm.reset();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
