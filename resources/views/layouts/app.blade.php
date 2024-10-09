<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.title', 'Laravel PROYECTO') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="icon" href="{{ asset('LOGG2.png') }}">

    <!-- Scripts -->


    <!-- Styles -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/js/cart.js'])
    @livewireScripts

    <!-- Styles personalizados -->
    @vite(['resources/css/home.css','resources/css/theme.css',])

    @livewireStyles
    <!-- cart js -->


</head>
<style>
    .notification {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        --notification-background: #313e2c;
        --notification-primary: #aaec8a;
        position: absolute;
        width: max-content;
        left: 0;
        right: 0;
        bottom: 2rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 0.375rem;
        background: var(--notification-background);
        color: var(--notification-primary);
        box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
        transform: translateY(1.875rem);
        opacity: 0;
        visibility: hidden;
        animation: fade-in 3s linear;
        z-index: 9999;
    }

    .notification__icon {
        height: 1.825rem;
        width: 1.825rem;
        padding: 0.2rem
    }

    .notification__body {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;

    }

    .notification__progress {
        position: absolute;
        left: 0.25rem;
        bottom: 0.25rem;
        width: calc(100% - 0.5rem);
        height: 0.2rem;
        transform: scaleX(0);
        transform-origin: left;
        background: linear-gradient(to right, var(--notification-background), var(--notification-primary));
        border-radius: inherit;
    }




</style>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="user-select: none;"
                ondragstart="return false;">
                <div class="container">
                    <!-- rellena ancho: container-fluid-->
                    @include('partials.header')
                </div>
            </nav>
        </header>
    </div>

    <!--button onclick="showNotification()" id="notifyBtn">Mostrar Notificación</button-->

    <div class="notification" id="notification">
        <div class="notification__body">
            <span>Producto agregado al carrito.</span>
            <i class="fas fa-box-open notification__icon"></i>
        </div>
        <div class="notification__progress"></div>
    </div>

    <main class="container d-flex flex-column">
        <div class="row justify-content-center ">
            @yield('content')
        </div>
    </main>

    <footer class="footer py-5 bg-dark text-light">
        @include('partials.footer')
    </footer>
</body>
<script>
function showNotification() {
    const notification = document.getElementById('notification');
    const progressBar = document.querySelector('.notification__progress');

    // Create a new style sheet for animations if it doesn't already exist
    let styleSheet = document.querySelector('#notification-styles');
    if (!styleSheet) {
        styleSheet = document.createElement("style");
        styleSheet.id = 'notification-styles';
        document.head.appendChild(styleSheet);
    }

    // Define the animations @keyframes
    styleSheet.sheet.insertRule(`
        @keyframes fade-in {
            0% {
                opacity: 0;
                visibility: visible;
                transform: translateY(10px);
            }
            5% {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
            40% {
                opacity: 1;
                visibility: visible; /* Maintain visibility during fade-in */
                transform: translateY(0);
            }
        }
    `, styleSheet.sheet.cssRules.length);

    styleSheet.sheet.insertRule(`
        @keyframes fade-out {
            0% {
                opacity: 1; /* Starts fully visible */
            }
            100% {
                opacity: 0; /* Completely disappears */
                visibility: hidden; /* Hides the element */
            }
        }
    `, styleSheet.sheet.cssRules.length);

    styleSheet.sheet.insertRule(`
        @keyframes progress {
            from {
                transform: scaleX(0); /* Comienza desde 0% */
            }
            to {
                transform: scaleX(1); /* Completa al 100% de ancho */
            }
        }
    `, styleSheet.sheet.cssRules.length);

    // Apply inline style to create the fade-in animation
    notification.style.display = 'block';
    notification.style.animation = 'fade-in 1.2s forwards';
    
    // Reset and animate progress bar
    progressBar.style.transform = 'scaleX(0)'; // Start progress bar at 0
    void progressBar.offsetWidth; // Forzar reflujo para reiniciar la animación
    progressBar.style.animation = 'progress 0.7s linear forwards'; // Animate progress bar filling

    // Hide the notification after 3 seconds with fade-out
    setTimeout(() => {
        notification.style.animation = 'fade-out 0.2s 1.2s linaer forwards';
        
        // Reset progress bar after fade-out animation
        setTimeout(() => {
            notification.style.display = 'none'; // Ocultar notificación
            progressBar.style.transform = 'scaleX(0)'; // Reset the progress bar
            progressBar.style.animation = 'none'; // Detener cualquier animación previa
        }, 100); // Mismo tiempo que la animación de fade-out
    }, 600); // Tiempo total que se muestra la notificación
}

</script>

</html>