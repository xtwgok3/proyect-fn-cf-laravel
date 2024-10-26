<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://laravel.psy-electronics.com https://cdnjs.cloudflare.com 'unsafe-inline' 'unsafe-eval';">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Descripción de tu proyecto aquí.">
    <meta name="keywords" content="palabras, clave, aquí">

    <title>{{ config('app.title', 'Laravel PROYECTO') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css">
    </noscript>

    <link rel="icon" href="{{ asset('LOGG3.png') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/js/cart.js'])
    @livewireScripts

    <!-- Styles personalizados -->
    @vite(['resources/css/home.css', 'resources/css/theme.css'])
    @livewireStyles
<style type="text/css">.notification{box-sizing:border-box;margin:0;padding:0;--notification-background:#313e2c;--notification-primary:#aaec8a;position:fixed;width:max-content;left:0;right:0;bottom:2rem;margin-left:auto;margin-right:auto;border-radius:.375rem;background:var(--notification-background);color:var(--notification-primary);box-shadow:0 1px 10px rgb(0 0 0 / .1);transform:translateY(1.875rem);opacity:0;visibility:hidden;animation:fade-in 3s linear;z-index:9999}.notification__icon{height:1.825rem;width:1.825rem;padding:.2rem}.notification__body{display:flex;flex-direction:row;align-items:center;gap:.5rem;padding:.5rem 1rem}.notification__progress{position:absolute;left:.25rem;bottom:.25rem;width:calc(100% - 0.5rem);height:.2rem;transform:scaleX(0);transform-origin:left;background:linear-gradient(to right,var(--notification-background),var(--notification-primary));border-radius:inherit}</style>
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="user-select: none;" ondragstart="return false;">
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

    <!-- chat -->
    <div>
        @include('livewire.chat_bot')
    </div>
<script type="text/javascript">function showNotification(){const e=document.getElementById("notification"),n=document.querySelector(".notification__progress");let t=document.querySelector("#notification-styles");t||(t=document.createElement("style"),t.id="notification-styles",document.head.appendChild(t)),t.sheet.insertRule("\n        @keyframes fade-in {\n            0% {\n                opacity: 0;\n                visibility: visible;\n                transform: translateY(10px);\n            }\n            5% {\n                opacity: 1;\n                visibility: visible;\n                transform: translateY(0);\n            }\n            40% {\n                opacity: 1;\n                visibility: visible; /* Maintain visibility during fade-in */\n                transform: translateY(0);\n            }\n        }\n    ",t.sheet.cssRules.length),t.sheet.insertRule("\n        @keyframes fade-out {\n            0% {\n                opacity: 1; /* Starts fully visible */\n            }\n            100% {\n                opacity: 0; /* Completely disappears */\n                visibility: hidden; /* Hides the element */\n            }\n        }\n    ",t.sheet.cssRules.length),t.sheet.insertRule("\n        @keyframes progress {\n            from {\n                transform: scaleX(0); /* Comienza desde 0% */\n            }\n            to {\n                transform: scaleX(1); /* Completa al 100% de ancho */\n            }\n        }\n    ",t.sheet.cssRules.length),e.style.display="block",e.style.animation="fade-in 1.2s forwards",n.style.transform="scaleX(0)",n.offsetWidth,n.style.animation="progress 0.7s linear forwards",setTimeout((()=>{e.style.animation="fade-out 0.2s 1.2s linaer forwards",setTimeout((()=>{e.style.display="none",n.style.transform="scaleX(0)",n.style.animation="none"}),100)}),600)}</script>
</body>
</html>
