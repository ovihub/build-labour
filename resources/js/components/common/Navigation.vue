<template>
    <div class="row">
        <img class="bl-nav-logo" src="/img/icons/build-labour-logo-white.png"
            srcset="/img/icons/build-labour-logo-white@2x.png 2x, /img/icons/build-labour-logo-white@3x.png 3x">

        <input class="bl-nav-search" id="search" type="text" name="search" />

        <ul class="row bl-nav-list">
            <li>
                <div class="bl-nav-tab">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M-3-3h24v24H-3z"/>
                            <path fill="#FFF" fill-rule="nonzero" d="M15 4h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zM5 8H3a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1zm10 8h-2a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1zM5 16H3a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zM16 0h-4a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM6 0H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10 8h-4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2zM6 12H2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2z"/>
                        </g>
                    </svg>
                </div>

                <p class="bl-nav-tab-label">Dashboard</p>
            </li>

            <li>
                <div class="bl-nav-tab">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M-1-3h24v24H-1z"/>
                            <path fill="#FFF" fill-rule="nonzero" d="M20 0H2C.9 0 0 .9 0 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V2c0-1.1-.9-2-2-2zm-1 16H3a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1zM5 7h7a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-3h7a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z"/>
                        </g>
                    </svg>
                </div>
                <p class="bl-nav-tab-label">Jobs</p>
            </li>

            <li>
                <div class="bl-nav-tab">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M-2-2h24v24H-2z"/>
                            <path fill="#FFF" fill-rule="nonzero" d="M18 3v10a1 1 0 0 1-1 1H3.584a1 1 0 0 0-.707.293L2 15.17V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1zM2 0C.9 0 .01.9.01 2L0 20l4-4h14c1.1 0 2-.9 2-2V2c0-1.1-.9-2-2-2H2zm3 10h6a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-3h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2zm0-3h9a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z"/>
                        </g>
                    </svg>
                </div>

                <p class="bl-nav-tab-label">Messages</p>
            </li>
        </ul>

        <div class="bl-nav-notification">
            <logout></logout>

            <div class="bl-nav-tab-style-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M-4-2h24v24H-4z"/>
                        <path fill="#FFF" fill-rule="nonzero" d="M8 20c1.1 0 2-.9 2-2H6c0 1.1.9 2 2 2zm6-6V9c0-3.07-1.63-5.64-4.5-6.32V2C9.5 1.17 8.83.5 8 .5S6.5 1.17 6.5 2v.68C3.64 3.36 2 5.92 2 9v5L.354 15.646A1.207 1.207 0 0 0 0 16.5a.5.5 0 0 0 .5.5h15a.5.5 0 0 0 .5-.5c0-.32-.127-.627-.354-.854L14 14zm-3 1H5a1 1 0 0 1-1-1V9c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v5a1 1 0 0 1-1 1z"/>
                    </g>
                </svg>
            </div>
                
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

        }
    }
</script>