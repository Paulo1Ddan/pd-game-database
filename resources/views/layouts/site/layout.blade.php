<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('style-css')
    <link rel="stylesheet" href="{{asset('css/global/global.css')}}">
</head>
<body>

    <header class="full-width">
        <div class="header-content full-height full-width py-2 px-3 flex-full-center">
            <a href="{{ route('login') }}" class="logo margin-center">
                <img src="{{ asset('assets/icons/game2-sf-svgrepo-com.svg') }}">
                <span class="fs-2 fw-bold ms-2">Game Database</span>
            </a>
        </div>
    </header>

    @yield('content')

    @stack('script-js')
    <script src="https://kit.fontawesome.com/8006ee25d3.js" crossorigin="anonymous"></script>
</body>
</html>