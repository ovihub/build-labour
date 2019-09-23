<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Appetiser') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?ref={{ strtotime("now") }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon-new.ico" type="image/x-icon">
    <link rel="icon" href="/favicon-new.ico" type="image/x-icon">
</head>
<body>
    <div id="app">
        @if (isset($_COOKIE['bl_token']))
            <header class="site-header">
                <div class="main-nav">
                    <div class="container">
                        <navigation></navigation>
                    </div>
                </div>
            </header>
        @endif
        
        <alert></alert>
        
        <div class="content-section">
            <div class="container">

                @yield('content')
                
            </div>
        </div>

        @if (isset($_COOKIE['bl_token']))
            @include('layouts.footer')
        @endif

    </div>

    <script src="/js/app.js"></script>
    
    @stack('scripts')
</body>
</html>
