<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Appetiser') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?ref={{ strtotime("now") }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?ref={{ strtotime("now") }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/buildlabourfavicon.ico" type="image/x-icon">
    <link rel="icon" href="/buildlabourfavicon.ico" type="image/x-icon">
</head>
<body class="admin">
    <div id="app">
        <alert></alert>

        <div class="container-fluid">
            <div class="row">
                @if (isset($_COOKIE['bl_token']))
                    <div class="col-md-2 col-sm-2">
                        @include('layouts.sidebar')
                    </div>
                    
                    <div class="col-md-10 col-sm-10 bl-content">
                        @yield('content')
                    </div>
                @else            
                    <div class="col-md-12 col-sm-12">
                        @yield('content')
                    </div>
                @endif
            </div>
        </div>
        
    </div>
</body>
</html>
