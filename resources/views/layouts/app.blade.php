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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Styles personalizados -->
    @vite(['resources/css/home.css'])
    @vite(['resources/css/theme.css'])

    <!-- cart js -->
    @vite(['resources/js/cart.js'])
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="user-select: none;"
                ondragstart="return false;">
                <div class="container"> <!-- rellena ancho: container-fluid-->
                    @include('partials.header')
                </div>
            </nav>
        </header>
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

</html>
