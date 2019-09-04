<template>
    <div>
    <div v-show="creating">
        <transition appear appear-active-class="appear-slide-enter-active">
            <new-job-details></new-job-details>
        </transition>
        <transition appear appear-active-class="appear-slide-enter-active">
            <new-job-requirements></new-job-requirements>
        </transition>
        <transition appear appear-active-class="appear-slide-enter-active">
            <new-job-responsibilities></new-job-responsibilities>
        </transition>
    </div>
    <div class="profile-item-2" v-show="! creating">
        <delete-modal></delete-modal>

        <ul class="list-job-items">
        <transition-group name="list">
            <li class="job-items" v-for="(post, index) in jobPosts" :key="index+0">
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="job-title mt-0">{{ post.template_name ? post.template_name : (post.title ? post.title : post.job_role.job_role_name) }}</div>
                            <div class="title-label mb-3">{{ post.template_name ? 'Template Name' : 'Job Title' }}</div>
                        </div>
                        <div class="col-md-4 col-sm-4 mb-3">
                            <div class="row ta-center">
                                <div class="col-icon icon-buttons" @click="onClickAction('preview', post)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="22" viewBox="0 0 31 22">
                                        <g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)">
                                            <path d="M.75 10s5.09-10 14-10 14 10 14 10-5.09 10-14 10-14-10-14-10z"/>
                                            <circle cx="14.75" cy="10" r="4"/>
                                        </g>
                                    </svg>
                                    <div class="icon-label">Preview</div>
                                </div>
                                <div class="col-icon icon-buttons" @click="onClickAction('edit', post)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                        <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2a2.828 2.828 0 1 1 4 4L6.5 19.5 1 21l1.5-5.5L16 2z"/>
                                    </svg>
                                    <div class="icon-label">Edit</div>
                                </div>
                                <div class="col-icon icon-buttons" @click="onClickAction('duplicate', post)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                                        <g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)">
                                            <rect width="13" height="13" x="7" y="7" rx="2"/>
                                            <path d="M3 13H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                                        </g>
                                    </svg>
                                    <div class="icon-label">Duplicate</div>
                                </div>
                                <div class="col-icon icon-buttons" @click="onClickAction('delete', post)">
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
        </transition-group>
        </ul>
    </div>
    </div>
</template>

<script>
    import Api from '@/api';
    import NewJobDetails from '../job/NewJobDetails';
    import NewJobRequirements from '../job/NewJobRequirements';
    import NewJobResponsibilities from '../job/NewJobResponsibilities';
    import DeleteModal from '../common/DeleteModal';

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
                    delete: '/api/v1/job/', // {id}/delete',
                    duplicate: '/api/v1/job/', // {id}/duplicate-as-template',
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
            onClickAction(action, post) {
                switch(action) {
                    case 'preview':
                        window.location.href = '/job/view/?cid=' + post.company_id + '&jid=' + post.id;
                        break;

                    case 'edit':
                        this.creating = true;
                        Bus.$emit('editJobPost', post);
                        window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
                        break;

                    case 'duplicate':
                        this.duplicatePost(post.id, post.company_id, post.is_template);
                        break;

                    case 'delete':
                        $('#deleteRecordModal').modal('show');
                        Bus.$emit('deleteJobPost', this.endpoints.delete + post.id + '/delete');
                        break;
                }
            },
            async duplicatePost(id, cid, isTemplate) {
                let vm = this;

                await axios.post(this.endpoints.duplicate + id + (isTemplate ? '/duplicate-as-template' : '/duplicate'), { 
                    confirmation: isTemplate ? 'duplicate_as_template' : 'duplicate',
                    company_id: cid,
                
                }, Utils.getBearerAuth()).then(function(response) {

                    console.log(response.data.data);
                
                }).catch(function(error) {
                    let inputErrors = Utils.handleError(error);
                    
                    if (inputErrors) vm.errors = inputErrors;
                });
            },
            getJobPosts(endpoint) {
                let vm = this;

                Promise.resolve(Api.getJobPosts(endpoint)).then(function(data) {
                    vm.jobPosts = data.data.jobs;
                });
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

            Bus.$on('removeJobPost', function() {
                console.log('removeJobPost');
            });

            Bus.$on('getJobPosts', function(type) {
                vm.jobPosts = [];
                
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

            Bus.$emit('activateTab', 'jobs');
        },
        components: {
            NewJobDetails,
            NewJobRequirements,
            NewJobResponsibilities,
            DeleteModal,
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
</style>