<template>
    <div class="row">
        <div class="col-md-1 col-sm-1">
            <a href="#">
                <img class="site-nav-brand" src="/img/build-labour-logo-white.png"
                    srcset="/img/icons/build-labour-logo-white@2x.png 2x, /img/icons/build-labour-logo-white@3x.png 3x">
            </a>
        </div>

        <div class="col-md-3 col-sm-3">
            <input class="site-nav-search" id="search" type="text" name="search" />
        </div>

        <div class="col-md-1">
            <a href="#">
                <img class="site-nav-tab" src="/img/icons/dashboardinactive.png"
                    srcset="/img/icons/dashboardinactive@2x.png 2x, /img/icons/dashboardinactive@3x.png 3x">

                <p class="site-nav-tab-label">Dashboard</p>
            </a>
        </div>
        <div class="col-md-1">
            <a href="#">
                <img class="site-nav-tab" src="/img/icons/jobsearchinactive.png"
                    srcset="/img/icons/jobsearchinactive@2x.png 2x, /img/icons/jobsearchinactive@3x.png 3x">
        
                <p class="site-nav-tab-label">Jobs</p>
            </a>
        </div>
        <div class="col-md-1">
            <a href="#">
                <img class="site-nav-tab" src="/img/icons/messagesinactive.png"
                    srcset="/img/icons/messagesinactive@2x.png 2x, /img/icons/messagesinactive@3x.png 3x">

                <p class="site-nav-tab-label">Messages</p>
            </a>
        </div>
        <div class="col-md-3 col-sm-3">
        </div>
        <!-- <div class="col-md-1 col-sm-1 mt-2 pt-1">
            <logout></logout>
            <div class="col-md-1 col-sm-1">
                <a href="#">
                    <img class="profile-picture-nav" style="width:25px;height:25px;" src="/img/icons/default.png">
                </a>
            </div>
        </div> -->
        <div class="col-md-2 col-sm-2 mt-1">
            <div class="row justify-content-center">
                <logout></logout>
                <a href="#">
                    <img class="site-nav-tab" src="/img/icons/notificationsinactive.png"
                        srcset="/img/icons/notificationsinactive@2x.png 2x, /img/icons/notificationsinactive@3x.png 3x">
                </a>
            </div>
        </div>
    </div>
    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
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
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <logout></logout>
                </li>
            @endguest
        </ul>
    </div> -->
</template>

<script>
    export default {
        data() {
            return {

            }
        },

        methods: {

        }
    }
</script>