document.addEventListener("DOMContentLoaded", function () {

    function updateClock() {
        const clockElement = document.getElementById('digital-clock');
        if (clockElement) {
            const now = new Date();
            const timeString = now.toLocaleTimeString('ro-MD');
            const dateString = now.toLocaleDateString('ro-MD');
            clockElement.innerText = `${dateString} | ${timeString}`;
        }
    }
    if (document.getElementById('digital-clock')) {
        setInterval(updateClock, 1000);
        updateClock();
    }

    const navBar = document.querySelector('.navbar .container');

    if (navBar && !document.getElementById('darkModeBtn')) {
        const btnDark = document.createElement('button');
        btnDark.className = "btn btn-outline-light ms-3 btn-sm";
        btnDark.innerText = "Dark Mode";
        btnDark.id = "darkModeBtn";
        navBar.appendChild(btnDark);

        btnDark.addEventListener('click', function() {
            document.body.classList.toggle('bg-dark');
            document.body.classList.toggle('text-white');

            const isDark = document.body.classList.contains('bg-dark');
            btnDark.innerText = isDark ? "Light Mode" : "Dark Mode";

            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                if (isDark) {
                    card.classList.add('bg-secondary', 'text-white');
                } else {
                    card.classList.remove('bg-secondary', 'text-white');
                }
            });

            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });

        if (localStorage.getItem('theme') === 'dark') {
            btnDark.click();
        }
    }
});
