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
    <!-- <link rel="shortcut icon" href="{{{ asset('/public/favicon2.ico') }}}"> -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="/favicon2.ico"> -->
    <!-- <link rel="shortcut icon" href="/favicon2.ico" type="image/x-icon"> -->
    <!-- <link rel="icon" href="/favicon2.ico" type="image/x-icon"> -->
</head>
<body>
    <div id="app">
        <header class="site-header">
            <div class="main-nav">
                <div class="container">
                    @if (!isset($_COOKIE['bl_token']))
                        <div class="row">
                            <div class="col-md-1 col-sm-1">
                                <a href="#">
                                    <img class="bl-nav-brand" src="/img/icons/build-labour-logo-white.png"
                                        srcset="/img/icons/build-labour-logo-white@2x.png 2x, /img/icons/build-labour-logo-white@3x.png 3x">
                                </a>
                            </div>

                            <div class="col-md-9 col-sm-9"></div>

                            <div class="col-md-2 col-sm-2 mt-2 pt-1">
                                <a href="/login">Login</a> &nbsp; | &nbsp; <a href="/register">Register</a>
                            </div>
                        </div>
                    @else
                        <navigation></navigation>
                    @endif
                </div>
            </div>
        </header>
        
        <alert></alert>
        
        <div class="content-section">
            <div class="container">

                @yield('content')
                
            </div>
        </div>

        @include('layouts.footer')

    </div>
</body>
</html>
