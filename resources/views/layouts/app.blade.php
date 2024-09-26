<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <style>
        .card {
            background-color: white !important;
        }
    </style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <STRONG>VER TIENDA</STRONG>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            @if (Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="rounded-circle border" style="width: 80px; height: 80px; margin-left: 8px; border: 2px solid #ddd;">
                            @else
                            <img src="https://as2.ftcdn.net/v2/jpg/05/57/94/41/1000_F_557944126_ktHRUdfizYsrphqNXiBO7Pf8HHccNHun.jpg" alt="{{ Auth::user()->name }}" class="rounded-circle border" style="width: 80px; height: 80px; margin-left: 8px; border: 2px solid #ddd;">
                            @endif
                            <!--nombre perfil-->
                            <strong> {{ strtoupper(Auth::user()->name) }}</strong>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <strong>{{ __('Profile') }}</strong>
                                </a>

                                <a class="dropdown-item"  href="{{ route('invoices.index') }}">
                                    <strong>{{ __('Facturas') }}</strong>
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   <strong> {{ __('Logout') }}</strong>
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
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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

</html>