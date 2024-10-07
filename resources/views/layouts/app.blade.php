<!DOCTYPE html>
<html class="{{ session('theme', 'light') }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.title', 'Laravel PROYECTO') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="{{ asset('LOGG.png') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    

<style>
html,body {height: 100%;}
body {display: flex;flex-direction: column;}
main {flex: 1;}

.dropdown-item {transition: background-color 0.3s ease, color 0.3s ease;}
.dropdown-item:hover {background-color: #f8f9fa;color: #007bff;}
.dropdown-item:active {transform: scale(0.95);}
.social-icons i {font-size: 1.5rem;margin-right: 0.5rem;transition: transform 0.2s ease, color 0.3s ease;}
.social-icons i:hover {transform: scale(1.5);color: #007bff;}
</style>

<style>
    :root {
    --background-color: #f8f9fa;
    --text-color: #212529;
    --nav-bg-color: white;
}

body.light-theme {
    --background-color: #f8f9fa!important;
    --text-color: #212529;
    --nav-bg-color: white;
}

body.dark-theme {
    --background-color: #343a40!important;
    --text-color: #f8f9fa;
}

body {
    background-color: var(--background-color);
    color: var(--text-color);
}

</style>
<style>.card {background-color: white}/*card product*/</style>

</head>

<body class="{{ session('theme', 'light') }}">
<div id="app" class="{{ session('theme', 'light') }}">
    <header>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="user-select: none;" ondragstart="return false;">
            <div class="container-fluid"><!-- rellena ancho: container-fluid-->
                @include('partials.header')
            </div>
        </nav>
    </header>
</div>

    <main class="container-fluid d-flex flex-column {{ session('theme', 'light') }}">
        <div class="row justify-content-center ">
            
            @yield('content')

        </div>
    </main>

    <footer class="footer py-5 bg-dark text-light">
        @include('partials.footer')
    </footer>


</body>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this item ?");
    }

    Array.from(document.querySelectorAll('.addToCart')).forEach(function(element) {
        element.addEventListener('click', function() {
            const product = this.getAttribute('data-id');

            fetch(`/add-to-cart/${product}`, {
                    method: 'POST'
                    , headers: {
                        'Content-Type': 'application/json'
                        , 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    }
                    , body: JSON.stringify({
                        quantity: 1
                    })
                })
                .then(resposse => resposse.text())
                .then(data => {
                    document.getElementById('cart-icon').innerHTML = data;
                });
        });
    });

</script>

</html>