<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Gaming Cafe') }}</title> --}}
    <title>Gaming Cafe</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body>
    <div id="app">
        <div class="custom-navbar">
            <a class="navbar-brand" href="{{ url('/') }}">
                Gaming Cafe
            </a>

            <ul class="navbar-links navbar-left">
                <li><a href="{{ route('users.index') }}" @if (request()->routeIs('users.*')) class="active" @endif>Users</a></li>
                <li><a href="{{ route('computers.index') }}" @if (request()->routeIs('computers.*')) class="active" @endif>Computers</a></li>
                <li><a href="{{ route('games.index') }}" @if (request()->routeIs('games.*')) class="active" @endif>Games</a></li>
                <li><a href="{{ route('pricings.index') }}" @if (request()->routeIs('pricings.*')) class="active" @endif>Pricing</a></li>
                <li><a href="{{ route('sessions.index') }}" @if (request()->routeIs('sessions.*')) class="active" @endif>Sessions</a></li>
                <li><a href="{{ route('payments.index') }}" @if (request()->routeIs('payments.*')) class="active" @endif>Payments</a></li>
            </ul>

            <ul class="navbar-links navbar-right">
                @guest
                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @else
                    <li>
                        <a href="#" class="dropdown-toggle">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

        </div>

        <main class="pb-4 container mx-auto w-90">
            @yield('content')
        </main>

        <footer class="footer">
            Made by Riko Gunawan
        </footer>
    </div>
</body>

</html>

