<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('style-css')
    <link rel="stylesheet" href="{{ asset('css/global/global-app.css') }}">
</head>

<body>

    <header class="full-width py-2 px-3">
        <section class="default-layout full-height flex-between-center">
            <div class="header-content-1 flex-vertical-center full-height">
                <a href="{{ route('dashboard') }}" class="logo">
                    <img src="{{ asset('assets/icons/game2-sf-svgrepo-com.svg') }}">
                    <span class="fs-5 fw-bold ms-2">Game Database</span>
                </a>

                <div class="navigation-list full-height d-flex fs-5 ms-3">
                    <a href="{{ route('dashboard') }}"
                        class="navigation-item flex-full-center {{ request()->routeIs('dashboard') ? 'active' : '' }} full-height mx-2">Dashboard</a>
                    <a href="{{ route('app.actions') }}"
                        class="navigation-item flex-full-center {{ request()->routeIs('app.actions') ? 'active' : '' }} full-height mx-2">Ações</a>
                </div>
            </div>
            <div class="head-content-2 flex-vertical-center full-height">
                <div class="dropdown">
                    <p class="dropdown-toggle text-white fs-5" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </p>
                    <ul class="dropdown-menu dropdown-menu-dark custom-test">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Perfil</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();" href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </form>
                    </ul>
                </div>
            </div>
        </section>
    </header>

    <main class="mt-5">
        @yield('content')
    </main>
    <script src="{{ asset('js/global/jquery.js') }}"></script>
    <script src="https://kit.fontawesome.com/8006ee25d3.js" crossorigin="anonymous"></script>

    @stack('script-js')
</body>

</html>
