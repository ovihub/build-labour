<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Appetiser') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/buildlabourfavicon.ico" type="image/x-icon">
    <link rel="icon" href="/buildlabourfavicon.ico" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div class="auth-content-section">
            <div class="row justify-content-center">
                <img src="/img/build-labour-logo-orange.png"
                    srcset="/img/build-labour-logo-orange@2x.png 2x, /img/build-labour-logo-orange@3x.png 3x">
            </div>

            <div class="auth-text-logo">
                BUILD<br>
                LABOUR
            </div>

            @yield('content')
                            
        </div>

    </div>
</body>
</html>
