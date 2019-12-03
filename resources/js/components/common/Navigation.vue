<template>
    <div class="row">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="javascript:void(0)"><img class="bl-nav-logo" src="/img/BUILDLABOUR_FULLLOGO@1x.png" width="90" @click="onClickJobs()"></a>

                <div class="search-wrapper">
                    <input class="bl-nav-search bg-search" id="search" :placeholder="search_placeholder" type="text" name="search" ref="nav-search" v-model="keyword"
                           @click="onClickNavSearch" @keyup="onOpenSearch" />
                </div>

                <div class="nav-hamburger-wrapper">

                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle navbar-toggler" data-toggle="dropdown">
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <div class="dropdown-menu">
                            <!-- menu dropdown mobile mode -->
                            <ul class="navbar-nav ml-auto bl-nav-dev-sm">
                                <li ref="nav-mob-profile" class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" ref="nav-profile" @click="onClickProfile">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="M-2-2h24v24H-2z"/>
                                                <path fill="#FFF" fill-rule="nonzero" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zM5.07 16.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78A7.893 7.893 0 0 1 10 18c-1.86 0-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33A7.95 7.95 0 0 1 2 10c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM10 4C8.06 4 6.5 5.56 6.5 7.5S8.06 11 10 11s3.5-1.56 3.5-3.5S11.94 4 10 4zm0 5c-.83 0-1.5-.67-1.5-1.5S9.17 6 10 6s1.5.67 1.5 1.5S10.83 9 10 9z"/>
                                            </g>
                                        </svg>
                                        <span>
                                    Profile
                                </span>
                                    </a>
                                </li>
                                <li ref="nav-mob-jobs" class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" ref="nav-jobs" @click="onClickJobs">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="M-1-3h24v24H-1z"/>
                                                <path fill="#FFF" fill-rule="nonzero" d="M20 0H2C.9 0 0 .9 0 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V2c0-1.1-.9-2-2-2zm-1 16H3a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1zM5 7h7a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-3h7a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z"/>
                                            </g>
                                        </svg>
                                        <span>
                                           {{ jobNavLabel }}
                                        </span>
                                    </a>
                                </li>
                                <li ref="nav-jobs" class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" ref="nav-messages" @click="onClickMessages">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="M-2-2h24v24H-2z"/>
                                                <path fill="#FFF" fill-rule="nonzero" d="M18 3v10a1 1 0 0 1-1 1H3.584a1 1 0 0 0-.707.293L2 15.17V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1zM2 0C.9 0 .01.9.01 2L0 20l4-4h14c1.1 0 2-.9 2-2V2c0-1.1-.9-2-2-2H2zm3 10h6a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-3h10a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2zm0-3h9a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z"/>
                                            </g>
                                        </svg>
                                        <span>
                                    Messages
                                </span>
                                    </a>
                                </li>
                                <li ref="nav-mob-messages" class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" @click="onClickGoLogout()">
                                    <span>
                                        Logout
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <!-- menu large devices mode -->
                    <ul class="row bl-nav-list bl-nav-dev-lg">
                        <li ref="nav-profile" @click="onClickProfile">
                            <div class="bl-nav-tab">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M-2-2h24v24H-2z"/>
                                        <path fill="#FFF" fill-rule="nonzero" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zM5.07 16.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78A7.893 7.893 0 0 1 10 18c-1.86 0-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33A7.95 7.95 0 0 1 2 10c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM10 4C8.06 4 6.5 5.56 6.5 7.5S8.06 11 10 11s3.5-1.56 3.5-3.5S11.94 4 10 4zm0 5c-.83 0-1.5-.67-1.5-1.5S9.17 6 10 6s1.5.67 1.5 1.5S10.83 9 10 9z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="bl-nav-tab-label">Profile</p>
                        </li>

                        <li ref="nav-jobs" @click="onClickJobs">
                            <div class="bl-nav-tab">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M-1-3h24v24H-1z"/>
                                        <path fill="#FFF" fill-rule="nonzero" d="M20 0H2C.9 0 0 .9 0 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V2c0-1.1-.9-2-2-2zm-1 16H3a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1zM5 7h7a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0-3h7a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2z"/>
                                    </g>
                                </svg>
                            </div>
                            <p class="bl-nav-tab-label">{{ jobNavLabel }}</p>
                        </li>

                        <li ref="nav-messages" @click="onClickMessages">
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
                        <logout text-only="false"></logout>

                        <div class="bl-nav-tab-style-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M-4-2h24v24H-4z"/>
                                    <path fill="#FFF" fill-rule="nonzero" d="M8 20c1.1 0 2-.9 2-2H6c0 1.1.9 2 2 2zm6-6V9c0-3.07-1.63-5.64-4.5-6.32V2C9.5 1.17 8.83.5 8 .5S6.5 1.17 6.5 2v.68C3.64 3.36 2 5.92 2 9v5L.354 15.646A1.207 1.207 0 0 0 0 16.5a.5.5 0 0 0 .5.5h15a.5.5 0 0 0 .5-.5c0-.32-.127-.627-.354-.854L14 14zm-3 1H5a1 1 0 0 1-1-1V9c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v5a1 1 0 0 1-1 1z"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </div>
</template>

<script>

    import Api from '@/api';
    import Logout from '../auth/Logout';

    export default {
        name: "navigation",
        data() {
            return {
                keyword: '',
                jobNavLabel: 'My Jobs',
                search_placeholder: 'Search Jobs, Individuals & Companies'
            }
        },
        created() {
            
            let vm = this;

            if (!Api._getBearerToken()) {

                Api.deleteToken()
            }

            Bus.$on('activateTab', function(tabName) {
                vm.$refs['nav-' + tabName].style = 'opacity: 1';
                vm.$refs['nav-mob-' + tabName].style = 'opacity: 1';
            });

            if (Api.getUserType()) {

                switch(Api.getUserType()) {

                    case 'worker': this.jobNavLabel = 'Search Other Jobs'; break;
                    case 'company': this.jobNavLabel = 'My Jobs'; break;
                    default :
                        this.jobNavLabel = 'Search Other Jobs'
                }
            }

        },
        mounted() {
            if (window.location.pathname == '/job/search/all') {
                this.$refs['nav-search'].focus();
                this.$nextTick(() => {
                    this.$refs['nav-search'].focus();
                });
            }
        },
        methods: {

            onClickGoProfile() {

                Bus.$emit('triggerGoProfile');
            },

            onClickGoLogout() {

                Bus.$emit('triggerGoLogout');
            },

            onClickDashboard() {
                // this.$refs['nav-dashboard'].style = 'opacity: 1';
            },

            onClickProfile() {

                Api.redirectToProfile();
            },


            onClickJobs() {

                if (window.location.pathname != '/job/list?type=templates') {
                    window.location = '/job/list?type=templates';
                }
            },

            onClickMessages() {
                // this.$refs['nav-messages'].style = 'opacity: 1';
            },

            onClickNavSearch() {
                if (window.location.pathname != '/job/search/all') {
                  //  window.location.href = '/job/search/all?type=jobs';
                    window.open('/job/search/all?type=individuals', '_blank');
                    window.focus();
                }
            },
            onOpenSearch() {
                Bus.$emit('openSearchKeyword', this.keyword);
            },
        },
        components: {
            Logout,
        },
    }
</script>