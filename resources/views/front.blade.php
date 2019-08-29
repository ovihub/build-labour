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
<body style="overflow:hidden">
    <div id="app">
        <!-- <app></app> -->

        <div class="auth-content-section">
            <div class="row justify-content-center">
                <img src="/img/buildlabour-fulllogo.png" srcset="/img/buildlabour-fulllogo@2x.png 2x, /img/buildlabour-fulllogo@3x.png 3x">
            </div>
            
            <div class="container">
                <div class="row justify-content-center">
                    <div class="form-group ta-center">
                        <br><br>
                        @if (! isset($_COOKIE['bl_token']))
                            <button type="submit" onclick="location.href='/login'" style="width:220px">
                                Login
                            </button>
                            <br><br>
                            <button type="submit" onclick="location.href='/register'" style="width:220px">
                                Join as a Worker
                            </button>
                            <br><br>
                            <button type="submit" onclick="location.href='/company/register'" style="width:220px">
                                Sign Up as an Employer
                            </button>
                        @else
                            <button type="submit" onclick="location.href='/login'">
                                My Profile
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
