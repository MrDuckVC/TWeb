// Ждем, пока вся страница загрузится (DOM Ready)
document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Lab 3 is loaded!");

    function updateClock() {
        const now = new Date();
        // Форматируем время чч:мм:сс
        const timeString = now.toLocaleTimeString('ro-MD');
        const dateString = now.toLocaleDateString('ro-MD');

        const clockElement = document.getElementById('digital-clock');
        if (clockElement) {
            clockElement.innerText = `${dateString} | ${timeString}`;
        }
    }
    setInterval(updateClock, 1000);
    updateClock();


    // Реализуем простой ротатор баннеров
    const banners = [
        "Upgrade Your Power",
        "Best Prices in Moldova",
        "Official Warranty 3 Years"
    ];
    let bannerIndex = 0;

    function rotateBanner() {
        const bannerElement = document.getElementById('custom-banner');
        if (bannerElement) {
            bannerElement.style.opacity = 0; // Эффект исчезновения

            setTimeout(() => {
                bannerElement.innerText = banners[bannerIndex];
                bannerElement.style.opacity = 1; // Эффект появления

                bannerIndex++;
                if (bannerIndex >= banners.length) {
                    bannerIndex = 0;
                }
            }, 500); // Ждем 0.5 сек пока исчезнет
        }
    }
    setInterval(rotateBanner, 3000);


    const contactForm = document.querySelector('form');

    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            event.preventDefault();

            let isValid = true;

            const nameInput = document.getElementById('nume');
            if (nameInput.value.length < 3) {
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

    // Создаем кнопку динамически
    const navBar = document.querySelector('.navbar .container');
    const btnDark = document.createElement('button');
    btnDark.className = "btn btn-outline-light ms-3 btn-sm";
    btnDark.innerText = "Dark Mode";
    btnDark.id = "darkModeBtn";

    if(navBar) {
        navBar.appendChild(btnDark);
    }

    // Логика переключения
    btnDark.addEventListener('click', function() {
        document.body.classList.toggle('bg-dark');
        document.body.classList.toggle('text-white');

        if (document.body.classList.contains('bg-dark')) {
            btnDark.innerText = "Light Mode";
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.classList.add('bg-secondary', 'text-white');
            });
        } else {
            btnDark.innerText = "Dark Mode";
            document.body.style.backgroundColor = "#f8f9fa";
             const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.classList.remove('bg-secondary', 'text-white');
            });
        }
    });
});
