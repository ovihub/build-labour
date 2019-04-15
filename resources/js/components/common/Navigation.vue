<template>
    <div class="row">
        <img class="bl-nav-logo" src="/img/icons/build-labour-logo-white.png"
            srcset="/img/icons/build-labour-logo-white@2x.png 2x, /img/icons/build-labour-logo-white@3x.png 3x">

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
            <logout></logout>

            <img class="bl-nav-tab" src="/img/icons/notificationsinactive.png"
                srcset="/img/icons/notificationsinactive@2x.png 2x, /img/icons/notificationsinactive@3x.png 3x">
                
            <img class="bl-nav-tab-search" src="/img/icons/search.png"
                srcset="/img/icons/search@2x.png 2x, /img/icons/search@3x.png 3x">
        </div>
    </div>
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