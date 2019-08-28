<template>
    <div v-if="creating">
        <new-job-details></new-job-details>
        <new-job-requirements></new-job-requirements>
        <new-job-responsibilities></new-job-responsibilities>
    </div>
    <div class="profile-item-2" v-else>
        <ul class="list-job-items">
            <li class="job-items" v-for="(post, index) in jobPosts" :key="index">
                <div class="profile-content">
                    <div class="job-title mt-0">{{ post.template_name }}</div>
                    <div class="title-label">Template Name</div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="row mb-4">
                                <div class="col-md-5 col-sm-5 job-label">Created</div>
                                <div class="col-md-7 col-sm-7 job-detail">{{ post.created_at_formatted }}</div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-5 col-sm-5 job-label">By</div>
                                <div class="col-md-7 col-sm-7 job-detail">{{ post.company.name }}</div>
                            </div>
                        </div>

                        <div class="col-md-7 col-sm-7">
                            <div class="row mb-4">
                                <div class="col-md-3 col-sm-3 job-label">Contract type</div>
                                <div class="col-md-9 col-sm-9 job-detail">{{ post.contract_type }}</div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-3 col-sm-3 job-label">Location</div>
                                <div class="col-md-9 col-sm-9 job-detail">{{ post.location }}</div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-3 col-sm-3 job-label">Salary</div>
                                <div class="col-md-9 col-sm-9 job-detail">${{ post.salary }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import Api from '@/api';
    import NewJobDetails from '../job/NewJobDetails';
    import NewJobRequirements from '../job/NewJobRequirements';
    import NewJobResponsibilities from '../job/NewJobResponsibilities';

    export default {
        name: "job-summary",
        data() {
            return {
                creating: false,
                jobPosts: [],
                input: {
                    job_id: '',
                },
                endpoints: {
                    get: '/api/v1/company/',
                    search: '/api/v1/job/search?keyword=',
                },
            }
        },
        props: {
            companyId: {
                type: String,
                required: false
            },
        },
        created() {
            let vm = this;

            Bus.$on('searchJobPosts', function(keyword, location) {
                vm.getJobPosts(vm.endpoints.search + keyword + '&location=' + location);
            });

            Bus.$on('createJob', function() {
                vm.creating = true;
            });

            Bus.$on('getJobPosts', function(type) {
                switch(type) {
                    case 'templates':
                        vm.getJobPosts(vm.endpoints.get + vm.companyId + '/templates');
                        break;

                    case 'active':
                    case 'closed':
                        vm.getJobPosts(vm.endpoints.get + vm.companyId + '/posts/jobs?status=' + type);
                        break;
                }
            })
            
            // this.getJobPosts(vm.endpoints.search + '&location=');
            this.getJobPosts(this.endpoints.get + this.companyId + '/templates');
        },
        methods: {
            getJobPosts(endpoint) {
                let vm = this;

                Promise.resolve(Api.getJobPosts(endpoint)).then(function(data) {
                    vm.jobPosts = data.data.jobs;
                });
            },
        },
        components: {
            NewJobDetails,
            NewJobRequirements,
            NewJobResponsibilities,
        },
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
        color: #000000;
        display: inline;
    }
    .job-detail {
        font-size: 15px;
        letter-spacing: 0.22px;
        color: #6b7172;
        display: inline-block;
    }
</style>