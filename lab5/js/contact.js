document.addEventListener("DOMContentLoaded", function () {
    const contactForm = document.querySelector('form');

    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            event.preventDefault();

            let isValid = true;

            const nameInput = document.getElementById('nume');
            if (nameInput.value.trim().length < 3) {
                alert("Eroare: Numele trebuie să aibă cel puțin 3 caractere!");
                nameInput.style.border = "2px solid red";
                isValid = false;
            } else {
                nameInput.style.border = "1px solid #ced4da";
            }

            const emailInput = document.getElementById('email');
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailRegex.test(emailInput.value)) {
                alert("Eroare: Email-ul nu este valid! (Ex: user@domain.com)");
                emailInput.style.border = "2px solid red";
                isValid = false;
            } else {
                emailInput.style.border = "1px solid #ced4da";
            }

            if (isValid) {
                alert("Succes! Mesajul a fost trimis.");
                contactForm.reset();
            }
        });
    }
});
