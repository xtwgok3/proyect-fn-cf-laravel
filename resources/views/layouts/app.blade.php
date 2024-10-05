<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    <link rel="icon" href="https://es.wikipedia.org/static/favicon/wikipedia.ico">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
.dropdown-item {transition: background-color 0.3s ease, color 0.3s ease;}
.dropdown-item:hover {background-color: #f8f9fa;/* Cambia el color de fondo */color: #007bff;/* Cambia el color del texto */}
.dropdown-item:active {transform: scale(0.95);/* Efecto de reducción al hacer clic */}
main {min-height: calc(60vh - 20px);/* Adjust 70px based on your navbar height */background-color: white;}
body {padding-bottom: 0px;/* Adjust padding as needed */}
.social-icons i {
    font-size: 1.5rem; /* Ajusta el tamaño según sea necesario */
    margin-right: 0.5rem; 
}
</style>

<body>
    <style>
        .card {
            background-color: white !important;
        }
    </style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('logo.png') }}" alt="LOGO" style="height: 40px;" />
                    <STRONG>VER TIENDA</STRONG>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar
                    <ul class="navbar-nav me-auto">
                        @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('invoices.index') }}">Facturas</a>
                                </li>
                        @endauth
                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mt-2">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <livewire:cart />

                            <li class="nav-item dropdown d-flex align-items-center">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    @if (Auth::user()->photo)
                                        <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                                            alt="{{ Auth::user()->name }}" class="rounded-circle border"
                                            style="width: 80px; height: 80px; margin-left: 8px; border: 2px solid #ddd;">
                                    @else
                                        <img src="https://fastly.picsum.photos/id/553/300/300.jpg?hmac=WE9FKJk4612U2gMl9W5K_2M4hVaqFL-Vg7Q7uCspY2A"
                                            alt="{{ Auth::user()->name }}" class="rounded-circle border"
                                            style="width: 80px; height: 80px; margin-left: 8px; border: 2px solid #ddd;">
                                    @endif
                                    <!--nombre perfil-->
                                    <strong> {{ strtoupper(Auth::user()->name) }}</strong>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        <i class="fas fa-user"></i> <strong>{{ __('Profile') }}</strong>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('invoices.index') }}">
                                        <i class="fas fa-file-invoice"></i> <strong>{{ __('Facturas') }}</strong>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> <strong>{{ __('Logout') }}</strong>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="background-color: white;">
            @yield('content')
        </main>
        
    </div>
</body>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this item ?");
    }

    Array.from(document.querySelectorAll('.addToCart')).forEach(function(element) {
        element.addEventListener('click', function() {
            const product = this.getAttribute('data-id');

            fetch(`/add-to-cart/${product}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
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
<hr>
<footer class="footer py-5 bg-dark text-light" style="margin-bottom: 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Acerca de Nosotros</h5>
                <p>Breve descripción de tu empresa o aplicación.</p>
                <p>Información de contacto: correo electrónico, teléfono, redes sociales.</p>
            </div>
            <div class="col-md-4">
                <h5>Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Boletín Informativo</h5>
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  disabled placeholder="Tu correo electrónico"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" disabled type="button"
                            id="button-addon2">Suscribirse</button-->
                    </div>
                </form>
                <ul class="list-inline social-icons">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; {{ now()->year }} Tu Empresa. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>
</html>
