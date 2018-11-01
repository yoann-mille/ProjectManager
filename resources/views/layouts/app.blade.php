<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProjectManager') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://use.fontawesome.com/releases/v5.4.2/js/all.js" integrity="sha384-wp96dIgDl5BLlOXb4VMinXPNiB32VYBSoXOoiARzSTXY+tsK8yDTYfvdTyqzdGGN" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'ProjectManager') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHead" aria-controls="navbarHead" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarHead">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->pseudo }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </nav>
        <div class="row">
            @auth
                <nav class="col-md-1 d-none d-md-block navbar-dark bg-dark sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column fa-ul">
                            <li class="nav-item">
                                <a class="nav-link @if (Route::currentRouteName() === 'home') active @endif" href="/">
                                    <span class="fa-li"><i class="fas fa-home fa-2x "></i></span>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if (Route::currentRouteName() === 'issues') active @endif" href="/issues">
                                    <span class="fa-li"><i class="fas fa-bug fa-2x"></i></span>Issues
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if (Route::currentRouteName() === 'projects') active @endif" href="/projects">
                                    <span class="fa-li"><i class="fas fa-sitemap fa-2x"></i></span>Projects
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if (Route::currentRouteName() === 'gantt') active @endif" href="/gantt">
                                    <span class="fa-li"><i class="fas fa-stream fa-2x"></i></span>Gantt
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            @endauth
            <main class="maincontent col-lg-11 px-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
