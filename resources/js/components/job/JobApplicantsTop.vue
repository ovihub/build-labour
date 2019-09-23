<template>
    <div>
        <div class="profile-item-2">
            <a href="javascript:void(0)" @click="goToJobs"><i class="fa fa-angle-left ml-2"></i> Back to Jobs</a>
        </div>

        <div class="profile-item-2" v-if="job && stats">
            <ul class="list-job-items">

                <li class="job-items">
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <div class="job-title mt-0"> {{ job.title ? job.title : job.job_role_name }}</div>
                                <div class="title-label mb-3">
                                    <label v-bind:class="{'text-success': job.status, 'text-danger': !job.status}">{{ job.status ? 'Active' : 'Inactive'}}</label>
                                    <small>{{ stats.no_of_views }} view</small>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 mb-3">
                                <div class="row ta-center">
                                    <div class="col-icon icon-buttons" @click="onClickAction('preview', post, index)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="22" viewBox="0 0 31 22">
                                            <g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)">
                                                <path d="M.75 10s5.09-10 14-10 14 10 14 10-5.09 10-14 10-14-10-14-10z"/>
                                                <circle cx="14.75" cy="10" r="4"/>
                                            </g>
                                        </svg>
                                        <div class="icon-label">Preview</div>
                                    </div>
                                    <div class="col-icon icon-buttons" @click="onClickAction('edit', post, index)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                            <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2a2.828 2.828 0 1 1 4 4L6.5 19.5 1 21l1.5-5.5L16 2z"/>
                                        </svg>
                                        <div class="icon-label">Edit</div>
                                    </div>
                                    <div class="col-icon icon-buttons" :style="! job.status ? 'cursor: default;' : ''" @click="onClickAction('duplicate', post, index)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                            <g fill="none" fill-rule="evenodd" :stroke="job.status ? '#000' : '#d8d8d8'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)">
                                                <rect width="13" height="13" x="7" y="7" rx="2"/>
                                                <path d="M3 13H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                                            </g>
                                        </svg>
                                        <div class="icon-label" :style="! job.status ? 'color: #d8d8d8;' : ''">Duplicate</div>
                                    </div>
                                    <div class="col-icon icon-buttons" @click="onClickAction('delete', post, index)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22">
                                            <g fill="none" fill-rule="evenodd" stroke="#FF3939" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M1 5h18M17 5v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5m3 0V3a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M8 10v6M12 10v6"/>
                                            </g>
                                        </svg>
                                        <div class="icon-label delete">Delete</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-0">
                        <div class="row">
                            <div class="col-md-5 col-sm-5">
                                <div class="row mb-4">
                                    <div class="col-md-5 col-sm-5 job-label">Created</div>
                                    <div class="col-md-7 col-sm-7 job-detail">{{ job.created_at_formatted }}</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-5 col-sm-5 job-label">By</div>
                                    <div class="col-md-7 col-sm-7 job-detail">{{ job.company.name }}</div>
                                </div>
                            </div>

                            <div class="col-md-7 col-sm-7">
                                <div class="row mb-4">
                                    <div class="col-md-3 col-sm-3 job-label">Contract type</div>
                                    <div class="col-md-9 col-sm-9 job-detail">{{ job.contract_type }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-3 col-sm-3 job-label">Location</div>
                                    <div class="col-md-9 col-sm-9 job-detail">{{ job.location }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-3 col-sm-3 job-label">Salary</div>
                                    <div class="col-md-9 col-sm-9 job-detail">${{ job.salary }}</div>
                                </div>
                            </div>
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
        name: "job-applicants-top",
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

