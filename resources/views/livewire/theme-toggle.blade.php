<i class="fas fa-adjust text-center items-center" style="position: relative; top:-5px; left:-1px;">
    <button id="themeToggleButton" class="btn btn" style="background-color:none!important;border:none;!important;font-family: var(--bs-body-font-family)!important; font-size: 13px; font-weight: bold;left: -12px; position: relative;"> </button>
</i>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('themeToggleButton');
    const root = document.documentElement;
    const dropdownMenu = document.getElementById('navbardd');
    const cards = document.querySelectorAll('.themeable');

    // Obtener el tema actual desde localStorage o usar 'light' por defecto
    const currentTheme = localStorage.getItem('theme') || 'light';

    // Aplicar el tema inicial
    if (currentTheme === 'dark') {
        root.classList.add('dark-theme');
        dropdownMenu.classList.add('dark-theme-dropdown');
        cards.forEach(card => {
            card.classList.add('dark-theme-card');
        });
        themeToggleButton.textContent = 'CLARO';
    } else {
        root.classList.remove('dark-theme');
        dropdownMenu.classList.remove('dark-theme-dropdown');
        cards.forEach(card => {
            card.classList.remove('dark-theme-card');
        });
        themeToggleButton.textContent = 'OSCURO';
    }

    // Manejar el evento de clic para alternar el tema
    themeToggleButton.addEventListener('click', () => {
        const isDarkTheme = root.classList.toggle('dark-theme');

        if (isDarkTheme) {
            dropdownMenu.classList.add('dark-theme-dropdown');
            cards.forEach(card => {
                card.classList.add('dark-theme-card');
            });
            localStorage.setItem('theme', 'dark');
            themeToggleButton.textContent = 'CLARO';
        } else {
            dropdownMenu.classList.remove('dark-theme-dropdown');
            cards.forEach(card => {
                card.classList.remove('dark-theme-card');
            });
            localStorage.setItem('theme', 'light');
            themeToggleButton.textContent = 'OSCURO';
        }
    });
});

    /* funciona la logica del toggle 23:46 06/10/24*/

</script>
