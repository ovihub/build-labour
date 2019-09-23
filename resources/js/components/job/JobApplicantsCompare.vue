<template>
    <div class="compare-wrapper">
        <div class="col-lg-4" v-for="(applicant, index) in applicants">
            <div class="profile-item-2">
                <div class="profile-content p-0">
                    <div class="item general-info">
                        <p class="mb-2">
                            <span class="bl-label-19">{{ applicant.full_name }}</span>
                        </p>
                        <p>
                            <span class="bl-label-14" style="margin-top: -5px;">Manager <strong>SolGen</strong></span>
                        </p>

                        <div class="bl-mb20">
                            Experienced Senior Project Manager; demonstrated history of working on a wide range of construction projects for leading companies.
                        </div>
                        <div class="bl-mb20">
                            <div class="bl-display bl-label-15-style-2">
                                Civil
                                <div class="bl-inline"> •&nbsp;</div>
                            </div>
                            <div class="bl-display bl-label-15-style-2">
                                Commercial
                            </div>
                            <span class="bl-display">Tier 2</span>
                        </div>
                        <div class="bl-mb20">
                            <div class="bl-display bl-label-15-style-2">
                               English Skill
                            </div>
                            <span class="bl-display">Proficient in written and spoken</span>
                        </div>
                        <div class="bl-mb20">
                            <div class="bl-display bl-label-15-style-2">
                                Drivers License
                            </div>
                            <span class="bl-display">Owns valid license</span>
                            <span class="bl-display">Don’t own/have access to personal registered vehicle</span>
                        </div>
                        <div class="bl-mb20">
                            <div class="bl-display bl-label-15-style-2">
                                Right to Work
                            </div>
                            <span class="bl-display">Yes, I have right to work legally in Australia</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="profile-title">Employment History</div>
                        <employment-list-compare :employments="applicant.experiences"></employment-list-compare>
                    </div>
                    <div class="item">
                        <div class="profile-title">Education</div>
                        <education-list-compare :educations="applicant.educations"></education-list-compare>
                    </div>
                    <div class="item">
                        <div class="profile-title">Tickets</div>
                    </div>
                    <div class="item">
                        <div class="profile-title">Industry Achievements & Skills</div>
                    </div>
                    <div class="item">
                        <div class="profile-title">Ideal Next Role</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Api from '@/api';
    import EmploymentListCompare from '../profile/EmploymentListCompare';
    import EducationListCompare from '../profile/EducationListCompare';

    export default {
        name: "job-applicants-compare",
        components: {
            EmploymentListCompare,
            EducationListCompare
        },
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

                        console.log('xxx');
                        console.log(response.data.data.applicants)
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
    .panel-heading p:after {
        font-family:'Glyphicons Halflings';
        content:"\e113";
        float: right;
        color: grey;
    }
    .panel-heading.collapsed p:after {
        content:"\e114";
    }

    .panel-heading {
        cursor: pointer;
    }
</style>