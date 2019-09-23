<template>
    <div>

        <div class="profile-item-2">
            <div class="bl-label-20-style-2">Candidates</div>
        </div>

        <div class="profile-item-2 score-actions" v-if="stats">

            <div class="profile-item-2">
                <div class="profile-content">
                    <div class="applicant-no">{{ stats.total }}</div>
                    <div class="applicant-label">Total</div>
                </div>
            </div>

            <div class="profile-item-2">
                <div class="profile-content">
                    <div class="applicant-no">{{ stats.no_of_new }}</div>
                    <div class="applicant-label">New</div>
                </div>
            </div>

            <div class="profile-item-2">
                <div class="profile-content">
                    <div class="applicant-no">{{ stats.no_of_invited }}</div>
                    <div class="applicant-label">Invited</div>
                </div>
            </div>

            <div class="profile-item-2">
                <div class="profile-content">
                    <div class="applicant-no">{{ stats.no_of_favourite }}</div>
                    <div class="applicant-label">Favourited</div>
                </div>
            </div>

            <div class="profile-item-2">
                <div class="profile-content">
                    <div class="applicant-no ns-no">{{ stats.no_of_not_suitable }}</div>
                    <div class="applicant-label ns-label">Not<br>Suitable</div>
                </div>
            </div>
        </div>

        <div class="profile-item-2 filter-actions">
            <div class="col-md-6 ml-0 mr-4">

                <input type="text" placeholder="Filter Applicants" name="search" class="form-control search-input bg-search" v-model="searchKeyword" @keyup="searchApplicants" >

            </div>

            <div class="col-md-4">
                <div class="sort-by">
                    <label>Sort By:</label>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle sort-sel" type="button" data-toggle="dropdown">{{ sortBy }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)" @click="selectSort('Most Recent')">Most Recent</a></li>
                            <li><a href="javascript:void(0)" @click="selectSort('Old')">Old</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2 compare-actions-wrapper pt-1">
                <a href="javascript:void(0)" @click="goToCompare()" class="btn btn-primary btn-sm compare">Compare</a>
            </div>
        </div>

        <div class="profile-item-2 applicants-wrapper" v-if="stats">

            <ul>
                <li v-for="(applicant, index) in applicants">
                    <div class="profile-content profile-item-2">
                        <div class="col-lg-5 bl-col p-0">
                            <p class="mb-2">
                                <span class="bl-label-19">{{ applicant.full_name }}</span>
                            </p>

                            <p>
                                <span class="bl-label-14" style="margin-top: -5px;">{{ applicant.job_role }} <strong>{{ applicant.company_name }}</strong></span>
                            </p>
                            <p class="bl-label-14">
                                Applied {{ applicant.applied_at_proper }}
                            </p>
                        </div>
                        <div class="col-lg-4 bl-col">

                            <div class="action-wrapper">
                                 <span class="action" @click="doScore(applicant.user_id, 'favourite')">
                                    <div>
                                         <img class="mr-1" :src="getFavouriteImg(applicant.user_id)">
                                    </div>
                                    <div>Favourite</div>
                                </span>
                                    <span class="action" @click="doScore(applicant.user_id, 'not_suitable')">
                                    <div>
                                         <img class="mr-1" :src="getNotSuitImg(applicant.user_id)">
                                    </div>
                                    <div>Not Suitable</div>
                                </span>
                            </div>

                        </div>

                        <div class="col-lg-3 bl-col pt-20">
                            <a href="javascript:void(0)" @click="goToProfile(applicant.user_id)">View Details<i class="fa fa-angle-right ml-2"></i></a>
                        </div>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';

    export default {
        name: "job-applicants",
        data() {
            return {
                disabled: false,
                applicants: [],
                job: null,
                stats: null,
                sortBy: 'Most Recent',
                searchKeyword: '',
                endpoints: {
                    getCompany: '/api/v1/company/',
                    getJob: '/api/v1/company/',
                    getApplicants: '/api/v1/job/',
                    getStats: '/api/v1/job/',
                    doScore: '/api/v1/job/'
                },
            }
        },
        created() {

            let companyId = this.companyId ? this.companyId : Utils.getUrlParams().cid;

            this.endpoints.getJob = this.endpoints.getJob + companyId + '/jobs/' + Utils.getUrlParams().jid;
            this.endpoints.getCompany = this.endpoints.getCompany + companyId;
            this.endpoints.getApplicants = this.endpoints.getApplicants + Utils.getUrlParams().jid + '/applicants';
            this.endpoints.getStats = this.endpoints.getStats + Utils.getUrlParams().jid + '/stats';
            this.endpoints.doScore = this.endpoints.doScore + Utils.getUrlParams().jid + '/do-score';

            this.getJob();
            this.searchApplicants();
            this.getStats();
        },
        methods: {

            getJob() {

                let vm = this;
                axios.get(vm.endpoints.getJob, Utils.getBearerAuth())

                    .then(function(response) {

                        vm.job = response.data.data.job;
                    })
            },

            getApplicants() {

                let vm = this;
                axios.get(vm.endpoints.getApplicants, Utils.getBearerAuth())

                    .then(function(response) {

                        vm.applicants = response.data.data.applicants;
                    })
            },

            goToJobs() {

                if (window.location.pathname != '/job/list?type=templates') {
                    window.location = '/job/list?type=templates';
                }
            },

            goToCompare() {

                let companyId = Utils.getUrlParams().cid;
                let jobId =  Utils.getUrlParams().jid;

                window.location = '/job/applicants?cid=' + companyId + '&jid=' + jobId + '&compare=true';
            },

            goToProfile(userId) {

                if (window.location.pathname != '/user/profile/' + userId) {
                    window.location = '/user/profile/' + userId;
                }
            },

            getStats() {

                let vm = this;
                axios.get(vm.endpoints.getStats, Utils.getBearerAuth())

                    .then(function(response) {

                        vm.stats = response.data.data.stats;
                        console.log(vm.stats);
                    })
            },

            getFavouriteImg(userId) {

                if (this.stats.favourites.includes(userId)) {

                    return '/img/icons/heart_selected.png';
                }

                return '/img/icons/heart.png';

            },

            getNotSuitImg(userId) {

                if (this.stats.not_suitable.includes(userId)) {

                    return '/img/icons/thumbs-down_selected.png';
                }

                return '/img/icons/thumbs-down.png';

            },

            doScore(userId, category) {

                let vm = this;

                axios.post(vm.endpoints.doScore, {scored_to: userId, category: category}, Utils.getBearerAuth())

                    .then(function(response) {

                        console.log(response);
                        vm.stats.favourites = response.data.data.favourites;
                        vm.stats.not_suitable = response.data.data.not_suitable;

                    })
            },

            selectSort(type) {

                let vm = this;

                vm.sortBy = type;
            },

            async searchApplicants() {

                console.log(this.searchKeyword);

                let vm = this;

                await axios.get(vm.endpoints.getApplicants + '?keyword=' + vm.searchKeyword + '&sort=' + vm.sortBy, Utils.getBearerAuth()).then(function(response) {

                    vm.applicants = response.data.data.applicants;

                }).catch(function(error) {

                });
            }
        }
    }
</script>


<style scoped>
    .job-title {
        font-size: 21px;
        font-weight: 600;
        color: #252829;
    }
    .title-label {
        font-size: 14px;
        font-weight: 500;
        color: #a2b2b7;
    }
    hr {
        opacity: 0.5;
        background-color: #f9f9f9;
    }
    .job-label {
        font-size: 15px;
        font-weight: 500;
        color: #000;
        display: inline;
    }
    .job-detail {
        font-size: 15px;
        letter-spacing: 0.22px;
        color: #6b7172;
        display: inline-block;
    }
    .icon-buttons:hover {
        cursor: pointer;
    }
    .icon-label {
        font-size: 10px;
        font-weight: 500;
        color: #000;
        margin-top: 2px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
    .icon-label.delete {
        color: #ff3939;
    }
    .col-icon {
        flex: 0 0 25%;
        max-width: 25%;
    }
    .bg-search {
        padding: 12px;
        font-size: 13px;
        border-radius: 4px;
        border: solid 1px rgba(0, 0, 0, 0.07);
        background-color: #ffffff;
        height: 46px;
        padding-left: 40px;
        background-position: 9px 13px;
        background-repeat: no-repeat;
        background-image: url(/img/icons/search.png);
        background-image: -webkit-image-set(url(/img/icons/search@2x.png) 2x, url(/img/icons/search@3x.png) 3x);
    }
</style>

