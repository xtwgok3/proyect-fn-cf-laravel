<i class="fas fa-adjust text-center items-center">
    <button id="themeToggleButton" class="btn btn" style="background-color:none!important;border:none;!important;font-family: var(--bs-body-font-family)!important; font-size: 13px; font-weight: bold;"> </button>
</i>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('themeToggleButton');
    const root = document.documentElement;

    // Obtener el tema actual desde localStorage o usar 'light' por defecto
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    // Aplicar el tema inicial
    if (currentTheme === 'dark') {
        root.classList.add('dark-theme');
        root.style.setProperty('--background-color', 'lightgray', 'important');
        root.style.setProperty('--text-color', '#ffffff', 'important');
        themeToggleButton.textContent = 'CLARO';
    } else {
        root.classList.remove('dark-theme');
        root.style.setProperty('--background-color', 'white', 'important');
        root.style.setProperty('--text-color', 'black', 'important');
        themeToggleButton.textContent = 'OSCURO';
    }

    // Manejar el evento de clic para alternar el tema
    themeToggleButton.addEventListener('click', () => {
        const isDarkTheme = root.classList.toggle('dark-theme');
        
        if (isDarkTheme) {
            root.style.setProperty('--background-color', 'lightgray', 'important');
            root.style.setProperty('--text-color', '#ffffff', 'important');
            localStorage.setItem('theme', 'dark');
            themeToggleButton.textContent = 'CLARO';
        } else {
            root.style.setProperty('--background-color', 'white', 'important');
            root.style.setProperty('--text-color', 'black', 'important');
            localStorage.setItem('theme', 'light');
            themeToggleButton.textContent = 'OSCURO';
        }
    });
});
/* funciona la logica del toggle 23:46 06/10/24*/
</script>