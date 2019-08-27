<template>
    <div>
        <ul class="list-job-items" v-for="(post, index) in jobPosts" :key="index">
            <li class="job-items">
                <div class="profile-content">
                    <div class="save-icon">
                        <!-- <img style="margin-top:-5px;margin-left:5px;margin-bottom:-5px" src="/img/icons/plus.png"
                            srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x"> -->
                        <div class="star-cont">
                            <input class="star" type="checkbox" title="Bookmark Job" :ref="'savedJobPost-' + post.id"
                                :value="post.id" v-model="checkedJobPosts" @click="save(post)" />
                        </div>

                        <div class="bl-label-14-style-2 bl-mt12">
                            Save
                        </div>
                    </div>
            
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img v-if="post.company.photo_url" class="bl-image-40" :src="post.company.photo_url"
                                @click="onClickCompanyPhoto(post.company_id)">

                            <avatar v-else cls="bl-image-40" size="40" border="0" border-radius="8px"
                                :initials="getInitials(post.company.name)"
                                :company-id="(post.company_id) ? post.company_id + '' : ''">
                            </avatar>
                        </div>
                        <div class="bl-col-2">
                            <div class="bl-display">
                                <span class="bl-label-19 bl-ml14">
                                    {{ post.company.name }}
                                </span>

                                <span class="bl-label-14 bl-ml14" style="margin-top:-5px">
                                    {{ getTimeDiffNow(post.created_at) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="job-summary">
                        <div class="bl-label-21">
                            {{ post.title ? post.title : post.job_role_name }}
                        </div>
                        <div class="bl-label-14-style-3">
                            {{ post.location }}
                            <!-- <span class="text-style-1">{{ getTimeDiffNow(post.job.created_at) }}</span> -->
                        </div>
                        <div class="bl-label-15 bl-mt16">
                            {{ post.description }}
                        </div>
                    </div>

                    <div class="profile-more mt-2">
                        <a :href="'/job/view/?cid=' + post.company_id + '&jid=' + post.id">
                            View Details<i class="fa fa-angle-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import Api from '@/api';
    import Avatar from '../common/Avatar';

    export default {
        name: "job-posts",
        data() {
            return {
                jobPosts: [],
                checkedJobPosts: [],
                input: {
                    job_id: '',
                },
                endpoints: {
                    get: '/api/v1/company/',
                    search: '/api/v1/job/search?keyword=',
                    save: '/api/v1/bookmarks',
                },
            }
        },
        props: {
            companyId: {
                type: String,
                required: false
            },
        },
        computed: {
            endpointGet() {
                return this.endpoints.get + this.companyId + '/posts/jobs';
            }
        },
        created() {
            let vm = this;

            Bus.$on('searchJobPosts', function(keyword, location) {
                vm.getJobPosts(vm.endpoints.search + keyword + '&location=' + location);
            });
            
            if (this.companyId) {
                this.getJobPosts(this.endpointGet);
                
            } else {
                this.getJobPosts(vm.endpoints.search + '&location=');
            }

            Promise.resolve(Api.getSavedJobPosts()).then(function(data) {
                vm.checkedJobPosts = data.data.bookmarks;
            });
        },
        methods: {
            getInitials(name) {
                return Utils.getInitials(name);
            },
            getJobPosts(endpoint) {
                let vm = this;

                Promise.resolve(Api.getJobPosts(endpoint)).then(function(data) {
                    vm.jobPosts = data.data.jobs;
                });
            },
            getTimeDiffNow(created_at) {
                return Utils.formatTimeDiffNow(created_at);
            },
            onClickCompanyPhoto(company_id) {
                Api.redirectToCompanyProfile(company_id);
            },
            async save(post) {
                let vm = this;
                
                this.disabled = true;
                this.input.job_id = post.id;

                await axios.post(vm.endpoints.save, vm.$data.input, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let data = response.data;
                        
                        Bus.$emit('saveJobPost', post, vm.$refs['savedJobPost-' + post.id][0].checked);
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
                
                this.disabled = false;
            },
        },
        components: {
            Avatar,
        },
    }
</script>