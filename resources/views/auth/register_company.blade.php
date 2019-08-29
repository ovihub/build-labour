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
    <link rel="shortcut icon" href="/buildlabourfavicon.ico" type="image/x-icon">
    <link rel="icon" href="/buildlabourfavicon.ico" type="image/x-icon">
</head>
<body style="overflow-x:hidden">
    <div id="app">
        
        <alert></alert>
        
        <div class="auth-content-section">
            <div class="row justify-content-center">
                <img src="/img/buildlabour-fulllogo.png" srcset="/img/buildlabour-fulllogo@2x.png 2x, /img/buildlabour-fulllogo@3x.png 3x">
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="form-card mt-5">
                        <transition appear appear-active-class="show-enter-active">
                            <register-company></register-company>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>
    <script src="{{ asset('js/auth/register_company.js') }}"></script>
    @stack('scripts')
</body>
</html>
