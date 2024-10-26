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
    <svg width="224" height="100" style="margin-bottom:18px;margin-right:12px" viewBox="0 0 370 100" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(1.1111 0 0 1.1111 -5.5556 -5.5533)" fill="#111" featurekey="tOsHRK-0"><g xmlns="http://www.w3.org/2000/svg"><path d="m30.562 23.745 8.413-0.211v2.551c-1.81 0.64-3.194 2.453-3.194 4.475 0 2.131 1.384 3.941 3.407 4.476l1.598 6.814c0 0.214 0.106 0.426 0.319 0.64l4.154 6.072v11.928l-1.703 4.685c0 0.32-0.106 0.532 0 0.746l0.745 10.12c0 0.957 0.852 1.702 1.917 1.702h0.106c1.065-0.106 1.811-0.957 1.705-2.022l-0.64-9.694 0.96-2.874h3.941l0.958 1.597-3.195 8.52c-0.319 0.959 0.212 2.025 1.171 2.451 0.959 0.32 2.13-0.212 2.451-1.174l3.407-9.373c0.213-0.531 0.213-1.063-0.107-1.596l-2.236-3.834v-11.5l4.154-6.075c0.106-0.105 0.212-0.319 0.318-0.637l1.492-6.495c2.023-0.535 3.515-2.345 3.515-4.476 0-2.022-1.386-3.835-3.303-4.475v-2.551h8.521v-1.282l-38.875 0.212v1.28zm28.972 5.006c0.957 0 1.809 0.851 1.809 1.81 0 0.749-0.426 1.28-0.958 1.6-0.212-0.214-0.532-0.32-0.851-0.428-0.428-0.105-0.853 0-1.172 0.214-0.425-0.318-0.639-0.851-0.639-1.386 0-0.96 0.746-1.81 1.811-1.81zm-17.681-5.217h16.296v2.551c-1.917 0.64-3.302 2.453-3.302 4.475 0 1.6 0.852 3.088 2.13 3.941l-1.383 5.86-2.984 4.367c-0.425-0.214-0.958-0.32-1.385-0.32h-2.45c-0.532 0-1.064 0.214-1.492 0.426l-2.875-4.261-1.491-6.072c1.385-0.852 2.236-2.236 2.236-3.941 0-2.022-1.384-3.835-3.301-4.475v-2.551zm-1.386 5.217c0.958 0 1.811 0.851 1.811 1.81 0 0.642-0.319 1.173-0.853 1.493-0.319-0.106-0.639-0.106-1.064 0-0.213 0-0.319 0.108-0.532 0.212-0.746-0.212-1.172-0.955-1.172-1.705 0-0.96 0.745-1.81 1.81-1.81z" fill="none"/><path d="m49.948 42.809c2.556 0 4.579-2.022 4.579-4.579 0-2.554-2.023-4.581-4.579-4.581-2.45 0-4.581 2.027-4.581 4.581 0 2.557 2.131 4.579 4.581 4.579z" fill="none"/><path d="m39.829 32.265c0.214-0.104 0.319-0.212 0.532-0.212 0.425-0.106 0.745-0.106 1.064 0 0.534-0.32 0.853-0.851 0.853-1.493 0-0.959-0.853-1.81-1.811-1.81-1.066 0-1.81 0.851-1.81 1.81 0 0.75 0.425 1.493 1.172 1.705z" clip-rule="evenodd" fill-rule="evenodd"/><path d="m58.362 31.947c0.319-0.214 0.745-0.318 1.172-0.214 0.318 0.108 0.639 0.214 0.851 0.428 0.532-0.32 0.958-0.851 0.958-1.6 0-0.959-0.852-1.81-1.809-1.81-1.066 0-1.811 0.851-1.811 1.81 0 0.535 0.213 1.067 0.639 1.386z" clip-rule="evenodd" fill-rule="evenodd"/><path d="m45.154 30.56c0 1.705-0.852 3.088-2.236 3.941l1.491 6.072 2.875 4.261c0.428-0.212 0.96-0.426 1.492-0.426h2.45c0.427 0 0.959 0.106 1.385 0.32l2.984-4.367 1.383-5.86c-1.277-0.852-2.13-2.34-2.13-3.941 0-2.022 1.385-3.835 3.302-4.475v-2.551h-16.297v2.551c1.917 0.641 3.301 2.453 3.301 4.475zm4.794 3.088c2.556 0 4.579 2.027 4.579 4.581 0 2.558-2.023 4.579-4.579 4.579-2.45 0-4.581-2.022-4.581-4.579 0-2.554 2.131-4.581 4.581-4.581z" clip-rule="evenodd" fill-rule="evenodd"/><path d="m49.948 4.998c-24.711 0-44.948 20.236-44.948 45.053 0 24.709 20.237 44.95 44.948 44.95 24.816 1e-3 45.052-20.24 45.052-44.95 0-24.817-20.236-45.053-45.052-45.053zm19.489 18.536h-8.521v2.551c1.917 0.64 3.303 2.453 3.303 4.475 0 2.131-1.492 3.941-3.515 4.476l-1.492 6.495c-0.106 0.319-0.212 0.532-0.318 0.637l-4.154 6.075v11.502l2.236 3.834c0.32 0.533 0.32 1.065 0.107 1.596l-3.407 9.373c-0.322 0.962-1.492 1.494-2.451 1.174-0.959-0.426-1.49-1.493-1.171-2.451l3.195-8.52-0.958-1.597h-3.941l-0.96 2.874 0.64 9.694c0.106 1.065-0.64 1.916-1.705 2.022h-0.106c-1.066 0-1.917-0.745-1.917-1.702l-0.745-10.12c-0.106-0.214 0-0.426 0-0.746l1.703-4.685v-11.929l-4.154-6.072c-0.213-0.214-0.319-0.426-0.319-0.64l-1.598-6.814c-2.023-0.535-3.407-2.345-3.407-4.476 0-2.022 1.384-3.835 3.194-4.475v-2.551l-8.413 0.211v-1.28l38.875-0.212v1.281z" clip-rule="evenodd" fill-rule="evenodd"/></g></g><g transform="matrix(2.9502 0 0 3.0652 119.94 13.003)" fill="#111" style="" featurekey="dVtZHI-0"><rect x="-3" width="87" height="24" rx="2" ry="2" fill="none" pointer-events="none" stroke="#617cff" stroke-width=".5px" style="position:absolute;z-index:2"/><path d="m6.5 18.66 0.6 1.34h0.84l-0.6-1.34h-0.84zm-5.88-0.02-0.6 1.36h0.8l0.6-1.34h-0.42zm1.42-13.18-0.52-1.22h-0.84l0.54 1.24h0.4zm4.72 0 0.52-1.22h-0.8l-0.54 1.2c0.12 0 0.26 0.0033398 0.42 0.01s0.29334 0.01 0.4 0.01zm9.64-0.96-1.9531e-5 -0.26h-5.86v0.64h3.38v15.12h0.7v-15.12h1.8c-0.02666-0.21334-0.03332-0.34-0.01998-0.38zm0.52-0.26v0.64h1.1v-0.64h-1.1zm13.66 0-2.04 12.62-2.44-12.62h-0.36l-1.74 10.02c0 0.02666 0.0033398 0.12 0.01 0.28s0.02 0.34 0.04 0.54 0.04 0.39 0.06 0.57 0.03666 0.29 0.05 0.33c0.36-1.92 0.65-3.46 0.87-4.62s0.42334-2.2334 0.61-3.22 0.28-1.5 0.28-1.54c0 0.05334 0.13334 0.78334 0.4 2.19s0.56 2.94 0.88 4.6 0.74666 3.8634 1.28 6.61h0.12l2.62-15.76h-0.64zm-9.36 0h-0.6l2.62 15.76h0.1l0.3-1.1zm17.28 15.76 0.06-0.64002c-0.76-0.08-1.4033-0.33666-1.93-0.77s-0.95-0.97-1.27-1.61-0.55-1.3533-0.69-2.14-0.21-1.5733-0.21-2.36v-0.74c0-0.85334 0.08666-1.69 0.26-2.51s0.44-1.55 0.8-2.19 0.82334-1.1567 1.39-1.55 1.2433-0.59 2.03-0.59c0.68 0 1.2 0.08666 1.56 0.26s0.68666 0.37334 0.98 0.6l0.4-0.5c-0.38666-0.30666-0.79666-0.55-1.23-0.73s-1.0033-0.27-1.71-0.27c-1.5333 0-2.77 0.68334-3.71 2.05s-1.41 3.1766-1.41 5.43v0.74c0 2.16 0.41666 3.9134 1.25 5.26s1.9767 2.1 3.43 2.26zm1.1-1.9531e-5c1.1333-0.08 2.1134-0.46 2.94-1.14l0.12-0.1v-5.34h-3.94v0.66h3.3v4.38c-0.69334 0.52-1.5133 0.82-2.46 0.9zm12.66 1.9531e-5c2.2134 0 4.1-0.78 5.66-2.34 0.77334-0.76 1.3567-1.58 1.75-2.46s0.59-1.88 0.59-3c0-2.2266-0.78-4.1066-2.34-5.64-1.56-1.52-3.4866-2.2866-5.78-2.3-1.4133 0.01334-2.74 0.36668-3.98 1.06-1.2133 0.70666-2.18 1.6867-2.9 2.94l0.58 0.32c0.65334-1.16 1.54-2.06 2.66-2.7 1.1067-0.64 2.32-0.96666 3.64-0.98 2.1334 0.01334 3.9066 0.72668 5.32 2.14 1.4133 1.3867 2.1266 3.1066 2.14 5.16 0 1.0267-0.18 1.9433-0.54 2.75s-0.88666 1.5633-1.58 2.27c-1.4267 1.4267-3.1666 2.14-5.22 2.14-1.28 0-2.44-0.27334-3.48-0.82l-0.3 0.58c1.1333 0.58666 2.3934 0.88 3.78 0.88zm13.16-6.64 3.96 6.64h0.78l-4.34-7.28zm0.08-1.22 4.48-7.84h-0.8l-5.64 9.94v-9.98h-0.68v11.24h0.68v-0.02l1.54-2.68zm12.4-1.7 0.54-0.84 0.06-0.1 2.86-4.6v-0.64h-6.9l-0.66 0.58v0.26h6.1l-3.3 5.34h1.3zm3.44 2.02c-0.17334-0.6-0.43338-1.1266-0.78004-1.58-0.32-0.41334-0.7-0.74668-1.14-1l-0.58 0.96c0.32 0.18666 0.6 0.42666 0.84 0.72 0.26666 0.34666 0.46 0.75332 0.58 1.22 0.14666 0.49334 0.22 1.0333 0.22 1.62v0.18c0 1.36-0.34666 2.42-1.04 3.18-0.68 0.74666-1.5867 1.12-2.72 1.12-0.74666 0-1.3733-0.11334-1.88-0.34s-0.93332-0.51332-1.28-0.85998l-0.8 0.8c0.45334 0.44 0.99334 0.8 1.62 1.08 0.64 0.29334 1.42 0.44 2.34 0.44 1.4667 0 2.6466-0.49334 3.54-1.48 0.88-0.97334 1.32-2.2866 1.32-3.94v-0.18c0-0.69334-0.08-1.34-0.24-1.94z"/></g></svg>
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
                    <a class="dropdown-item" wire:click="toggleTheme" style="width: 158px; height: 31.05px;">
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
