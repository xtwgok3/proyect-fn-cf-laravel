<div class="root *:{{ session('theme', 'light') }}">
    <div class="theme-element">Este es un elemento que cambiará de fondo.</div>
    <div class="theme-element">Otro elemento que también cambiará de fondo.</div>
    <button wire:click="toggleTheme" class="btn btn-secondary"> 
        {{ $theme === 'light' ? 'Cambiar a Dark' : 'Cambiar a Light' }}
    </button>
</div>

<script>
    Livewire.on('theme-updated', () => {
        const app = document.getElementById('app');
        const elements = document.querySelectorAll('[class*="session(theme)"]'); // Selecciona los elementos que contienen el tema

        // Cambia las clases del app
        app.classList.toggle('light', app.classList.contains('dark-theme'));
        app.classList.toggle('dark-theme', !app.classList.contains('dark-theme'));

        // Cambia el background color de los elementos
        elements.forEach(element => {
            if (app.classList.contains('dark-theme')) {
                element.style.backgroundColor = '#333741'; // Color de fondo oscuro
            } else {
                element.style.backgroundColor = '#ffffff'; // Color de fondo claro
            }
        });
    });
</script>
