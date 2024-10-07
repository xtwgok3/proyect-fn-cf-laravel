<i class="fas fa-adjust text-center items-center">
    <button id="themeToggleButton" class="btn btn" style="background-color:none!important;border:none;!important;font-family: var(--bs-body-font-family)!important; font-size: 13px; font-weight: bold;"> </button>
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

            dropdownMenu.style.backgroundColor = '#6d6b6b', 'important';

            cards.forEach(card => {
                card.style.setProperty('--bs-card-bg', '#827e7e', 'important');
                card.style.backgroundColor = '#827e7e';
                card.style.color = '#ffffff', 'important'; // Aplica el color de fondo directamente si es necesario
            });

            root.style.setProperty('--background-color', '#6d6b6b', 'important')
            root.style.setProperty('--text-color', '#ffffff', 'important');
            themeToggleButton.textContent = 'CLARO';
        } else {
            root.classList.remove('dark-theme');

            dropdownMenu.style.backgroundColor = 'white', 'important';

            cards.forEach(card => {
                card.style.setProperty('--bs-card-bg', '#f8f9fa', 'important');
                card.style.backgroundColor = '#f8f9fa'; // Aplica el color de fondo directamente si es necesario
                card.style.color = '#212529', 'important';
            });


            root.style.setProperty('--background-color', 'white', 'important');
            root.style.setProperty('--text-color', 'black', 'important');
            themeToggleButton.textContent = 'OSCURO';
        }

        // Manejar el evento de clic para alternar el tema
        themeToggleButton.addEventListener('click', () => {
            const isDarkTheme = root.classList.toggle('dark-theme');

            if (isDarkTheme) {

                dropdownMenu.style.backgroundColor = '#6d6b6b', 'important';

                cards.forEach(card => {
                    card.style.setProperty('--bs-card-bg', '#827e7e', 'important');
                    card.style.backgroundColor = '#827e7e', 'important'; // Aplica el color de fondo directamente si es necesario
                    card.style.color = '#ffffff';
                });


                root.style.setProperty('--background-color', '#6d6b6b', 'important');
                root.style.setProperty('--text-color', '#ffffff', 'important');
                localStorage.setItem('theme', 'dark');
                themeToggleButton.textContent = 'CLARO';
            } else {

                dropdownMenu.style.backgroundColor = 'white', 'important';


                cards.forEach(card => {
                    card.style.setProperty('--bs-card-bg', '#f8f9fa', 'important');
                    card.style.backgroundColor = '#f8f9fa'; // Aplica el color de fondo directamente si es necesario
                    card.style.color = '#212529', 'important';
                });


                root.style.setProperty('--background-color', 'white', 'important');
                root.style.setProperty('--text-color', 'black', 'important');
                localStorage.setItem('theme', 'light');
                themeToggleButton.textContent = 'OSCURO';
            }
        });
    });
    /* funciona la logica del toggle 23:46 06/10/24*/

</script>
