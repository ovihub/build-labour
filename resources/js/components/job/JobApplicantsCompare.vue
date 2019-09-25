<template>
    <div class="compare-wrapper">
        <div class="card-columns">
            <div class="card" v-for="(applicant, index) in applicants">
                <div class="profile-item-2">
                    <div class="profile-content p-0">
                        <div class="item general-info">
                            <p class="mb-2">
                                <span class="bl-label-19">{{ applicant.full_name }}</span>
                            </p>
                            <p>
                                <span class="bl-label-14" style="margin-top: -5px;">{{ applicant.job_role }} <strong>{{ applicant.company_name }}</strong></span>
                            </p>

                            <div class="bl-mb20">
                                {{ applicant.profile_description }}
                            </div>
                            <div class="bl-mb20">
                                <div class="bl-display bl-label-15-style-2" v-for="(sector, idx) in applicant.sectors" :key="idx">
                                    {{ sector.business_type }}
                                    <div class="bl-inline"> •&nbsp;</div>
                                </div>
                                <br>
                                <div class="bl-display" v-for="tier in applicant.tiers">
                                    {{ tier.tier_name }}
                                    <div class="bl-inline"> •&nbsp;</div>
                                </div>
                            </div>
                            <div class="bl-mb20">
                                <div class="bl-display bl-label-15-style-2">
                                    English Skill
                                </div>
                                <span class="bl-display">{{ parseEnglish(applicant.english_skill) }}</span>
                            </div>
                            <div class="bl-mb20">
                                <div class="bl-display bl-label-15-style-2">
                                    Drivers License
                                </div>
                                <span class="bl-display">{{ parseDriversLicense(applicant.drivers_license) }}</span>
                            </div>
                            <div class="bl-mb20">
                                <div class="bl-display bl-label-15-style-2">
                                    Right to Work
                                </div>
                                <span class="bl-display">{{ parseRightToWork(applicant.right_to_work) }}</span>
                            </div>
                        </div>
                        <div class="item employments">
                            <div class="profile-title mb-3">Employment History</div>
                            <employment-list-compare :employments="applicant.experiences"></employment-list-compare>
                        </div>
                        <div class="item educations">
                            <div class="profile-title mb-3">Education</div>
                            <education-list-compare :educations="applicant.educations"></education-list-compare>
                        </div>
                        <div class="item tickets">
                            <div class="profile-title mb-3">Tickets</div>
                            <ul>
                                <li v-for="(ticket, idx) in applicant.tickets" :key="idx" class="mb-2">
                                    <div class="bl-display bl-label-15-style-2">
                                        {{ ticket.ticket }}
                                    </div>
                                    <span class="bl-display">{{ ticket.description }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="item skills">
                            <div class="profile-title mb-3">Industry Achievements & Skills</div>
                            <ul>
                                <li v-for="(skill, idx) in applicant.skills" :key="idx" class="mb-2">
                                    <div class="bl-display bl-label-15-style-2">
                                        {{ skill.skill_name }}
                                    </div>
                                    <span class="bl-display">{{ skill.level_name }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="item next-role">
                            <div class="profile-title mb-3">Ideal Next Role</div>
                            <ul>
                                <li class="mb-2">
                                    <span class="bl-display">{{ applicant.ideal_next_role }}</span>
                                </li>
                                <li class="mb-2">
                                    <div class="bl-display bl-label-15-style-2">
                                        Maximum Distance from home
                                    </div>
                                    <span class="bl-display">{{ applicant.max_distance }}km</span>
                                </li>
                                <li class="mb-2">
                                    <div class="bl-display bl-label-15-style-2">
                                        Willing to relocate to
                                    </div>
                                    <span class="bl-display">{{ applicant.states }}</span>
                                </li>
                            </ul>
                        </div>
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

            this.searchApplicants();
            this.getStats();
        },
        methods: {

            parseEnglish(engVal) {

                return engVal == 1 ?
                    'Competent in written and spoken' :
                    'Not competent in written and spoken';
            },

            parseDriversLicense(val) {

                return val == 1 ?
                    'Owns valid license' :
                    'Does not own valid license';
            },

            parseRightToWork(val) {
                return val == 1 ? 'Yes, I have right to work in Australia' : 'No, I don\'t have right to work in Australia';
            },

            parseStates(states) {

                return states ? '' : states
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

    .card {
        background-color: transparent;
        background-clip: unset;
        border: none;
    }

</style>