@if (preg_match('/mobile/i', request()->header('User-Agent')))
    <style>
        #pdr {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        form .col-md-4 {
            margin-top: 4px;
        }

        .navbar-nav .dropdown-menu {
            position: absolute;
            margin-top: -35px;
        }


        .start-100 {
            left: 55% !important;
        }

        .w-100 {
            width: 82% !important;
            /*84*/
        }

        @media (min-width: 415px) and (max-width: 428px) {
            .w-100 {
                width: 78% !important;
                /*84*/
            }
        }

        @media (width: 390px) {
            .w-100 {
                width: 89% !important;
                /*84*/
            }
        }

        @media (width: 414px) {
            .w-100 {
                width: 81% !important;
                /*84*/
            }
        }

        @media (width: 490px) {
            .w-100 {
                width: 81% !important;
                /*84*/
            }
        }

        @media (min-width: 358px) and (max-width: 370px) {
            .w-100 {
                width: 95% !important;
                /*84*/
            }
        }

        @media (width: 375px) {
            .w-100 {
                width: 92% !important;
                /*84*/
            }
        }

        @media (min-width: 768px) and (max-width: 1200px) {
            div.col-md-9 {
                min-width: 100% !important;
                /* Esto también puede ayudar a evitar restricciones */
            }
        }
    </style>
@endif

<a class="navbar-brand " href="{{ url('/') }}" ondragstart="return false;">
    <img src="{{ asset('descarga2.png') }}" alt="LOGO" style="height: 100px;" />
    <STRONG>VER TIENDA</STRONG>
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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

            <li class="nav-item dropdown d-flex align-items-center" ondragstart="return false;">

                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                    @if (Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}"
                            class="rounded-circle border"
                            style="width: 80px; height: 80px; margin-left: 8px; border: 2px solid #ddd;">
                    @else
                        <img src="https://fastly.picsum.photos/id/553/300/300.jpg?hmac=WE9FKJk4612U2gMl9W5K_2M4hVaqFL-Vg7Q7uCspY2A"
                            alt="{{ Auth::user()->name }}" class="rounded-circle border"
                            style="width: 80px; height: 80px; margin-left: 8px; border: 2px solid #ddd;">
                    @endif
                    <!--nombre perfil-->
                    <strong> {{ strtoupper(Auth::user()->name) }}</strong>

                </a>

                <div id="navbardd" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                        <i class="fas fa-user"></i> <strong>{{ __('My Profile') }}</strong>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" wire:click="toggleTheme" style="width: 158px; height: 31.05px;"">
                        @livewire('theme-toggle')
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
