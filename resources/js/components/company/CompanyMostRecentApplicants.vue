<template>
    <div class="profile-item-3">
        <div class="profile-content">
            <span class="bl-label-16">Most Recent Candidates</span>
            <ul class="list-items">
                <li v-for="(applicant, index) in applicants" :key="index+0">
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img v-if="applicant.profile_photo_url" class="bl-image-32" :src="applicant.profile_photo_url">

                            <avatar v-if="!applicant.profile_photo_url" cls="bl-image-32" size="32" border="0" border-radius="8px"
                                    :initials="getInitials(applicant.full_name)"
                                    :company-id="false">
                            </avatar>
                        </div>
                        <div class="bl-col-2" style="margin-top:-2px">
                            <div class="bl-display">
                                <span class="bl-label-15 mt-0 pt-0">{{ applicant.full_name }}</span>
                                <span class="job-text">
                                    {{ applicant.address }} <br/>
                                </span>
                            </div>
                            <div class="bl-box-3"></div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="profile-more">
                <a href="/job/search">View More<i class="fa fa-angle-right ml-2"></i></a>
            </div>
        </div>
    </div>
</template>

<script>
    import Avatar from '../common/Avatar';
    import Api from '@/api';

    export default {
        name: "company-most-recent-applicants",

        data() {
            return {
                applicants: [],
                endpoints: {
                    company: '/api/v1/company'
                },
            }
        },

        props: {
            companyId: {
                type: String,
                required: false
            },
        },

        methods: {
            getInitials(name) {
                return Utils.getInitials(name);
            },
            getApplicants() {
                let vm = this;

                Promise.resolve(Api.getCompanyApplicants(vm.endpoints.company + `/${vm.companyId}/applicants?limit=3`)).then(function(data) {

                    vm.applicants = data.data.applicants;
                });
            },
        },
        created() {

            this.getApplicants();
        },
        components: {
            Avatar,
        },
    }
</script>