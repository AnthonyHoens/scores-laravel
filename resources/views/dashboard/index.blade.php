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
    <div>
        <h1>Premier League 2020</h1>
        @guest()
            <ul>
                <li><a href="{{ route('login') }}">Se connecter</a></li>
                <li><a href="{{ route('register') }}">S'inscrire</a></li>
            </ul>
        @endguest
        @auth()
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>
                    Se déconnecter
                </button>
            </form>
        @endauth
    </div>

    <x-standings></x-standings>

    <x-match-played :matches="$matches"></x-match-played>

    @auth()
        <x-match-create :teams="$teams"></x-match-create>
    @endauth
</body>
</html>

