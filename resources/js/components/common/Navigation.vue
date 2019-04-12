<template>
    <div class="row">
        <a href="#">
            <img class="bl-nav-logo" src="/img/icons/build-labour-logo-white.png"
                srcset="/img/icons/build-labour-logo-white@2x.png 2x, /img/icons/build-labour-logo-white@3x.png 3x">
        </a>

        <input class="bl-nav-search" id="search" type="text" name="search" />

        <ul class="row bl-nav-list">
            <li>
                <div class="bl-nav-tab">
                    <img style="width:18px;height:18px" src="/img/icons/dashboardinactive.png"
                        srcset="/img/icons/dashboardinactive@2x.png 2x, /img/icons/dashboardinactive@3x.png 3x">
                </div>

                <p class="bl-nav-tab-label">Dashboard</p>
            </li>

            <li>
                <div class="bl-nav-tab">
                    <img style="width:22px;height:18px" src="/img/icons/jobsearchinactive.png"
                        srcset="/img/icons/jobsearchinactive@2x.png 2x, /img/icons/jobsearchinactive@3x.png 3x">
                </div>
                <p class="bl-nav-tab-label">Jobs</p>
            </li>

            <li>
                <div class="bl-nav-tab">
                    <img style="width:20px;height:20px" src="/img/icons/messagesinactive.png"
                        srcset="/img/icons/messagesinactive@2x.png 2x, /img/icons/messagesinactive@3x.png 3x">
                </div>

                <p class="bl-nav-tab-label">Messages</p>
            </li>
        </ul>

        <div class="bl-nav-notification">
            <div class="row">
                <logout></logout>
                <a href="#">
                    <img class="bl-nav-tab" src="/img/icons/notificationsinactive.png"
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
            toggleNav() {
                $('ul.menu').fadeToggle("slow");
            }
        }
    }
</script>