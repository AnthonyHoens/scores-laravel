<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Menu') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="mb-2">
                                        <h2 class="dropdown-header text-uppercase">Utilisateur</h2>
                                        <a href="{{ route('user_show', \Illuminate\Support\Facades\Auth::user()->slug) }}" class="dropdown-item">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                                    </div>
                                    <nav class="mb-2">
                                        <h2 class="dropdown-header text-uppercase">Navigations</h2>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{ route('home_page') }}" class="dropdown-item">Accueil</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('team_page') }}" class="dropdown-item">Équipes</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user_page') }}" class="dropdown-item">Utilisateurs</a>
                                            </li>
                                        </ul>
                                    </nav>

                                    @canany(['add_match', 'add_team'])
                                        <nav class="mb-2">
                                            <h2 class="dropdown-header text-uppercase">Administrations</h2>
                                            <ul class="list-unstyled">
                                                @can('add_match')
                                                    <li><a href="{{ route('create_match') }}" class="dropdown-item">Ajouter un match</a></li>
                                                @endcan
                                                @can('add_team')
                                                    <li><a href="{{ route('create_team') }}" class="dropdown-item">Ajouter une équipe</a></li>
                                                @endcan
                                            </ul>
                                        </nav>
                                    @endcanany

                                    <p class="dropdown-header text-uppercase">Actions</p>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            <div class="container position-relative">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
