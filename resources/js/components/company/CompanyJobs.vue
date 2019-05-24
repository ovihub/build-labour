<template>
    <div class="profile-item-2" v-if="show">
        <div class="job-action">
            <div class="job-filter">
                Filter
            </div>
            <div class="job-sort">
                Sort by: <span  class="job-recent">Most Recent</span>
            </div>
        </div>
        <ul class="list-job-items" v-for="(job, index) in jobs" :key="index">
            <li class="job-items">
                <div class="profile-content">
                    <div class="save-icon">
                        <!-- <img style="margin-top:-5px;margin-left:5px;margin-bottom:-5px" src="/img/icons/plus.png"
                            srcset="/img/icons/plus@2x.png 2x, /img/icons/plus@3x.png 3x"> -->
                        <div class="star-cont">
                            <input class="star" type="checkbox" title="Bookmark Job" checked />
                        </div>

                        <div class="bl-label-14-style-2 bl-mt12">
                            Save
                        </div>
                    </div>
            
                    <div class="jobads-row">
                        <div class="bl-col-1">
                            <img class="bl-image-40" :src="job.company_photo">
                        </div>
                        <div class="bl-col-2">
                            <div class="bl-display">
                                <span class="bl-label-19 bl-ml14">
                                    {{ job.company_name }}
                                </span>

                                <span class="bl-label-14 bl-ml14" style="margin-top:-5px">
                                    {{ getTimeDiffNow(job.created_at) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="job-summary">
                        <div class="bl-label-21">
                            {{ job.job.title }}
                        </div>
                        <div class="bl-label-14-style-3">
                            {{ job.job.location }}<span class="text-style-1">{{ getTimeDiffNow(job.job.created_at) }}</span>
                        </div>
                        <div class="bl-label-15 bl-mt16">
                            {{ job.job.description }}
                        </div>
                    </div>

                    <div class="profile-more mt-2">
                        <a :href="'/job/view/?cid=' + job.company_id + '&jid=' + job.job.id">
                            View Details<i class="fa fa-angle-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false,
                jobs: [],
                endpoints: {
                    get_jobs: '/api/v1/company/1/posts/jobs',
                },
            }
        },

        created() {
            let component = this;

            Bus.$on('showCompanyJobs', function(flag) {
                component.show = flag;
                component.getJobs();
                
                Bus.$emit('hideCompanyPeople');
                Bus.$emit('hideCompanyPosts');
            });

            Bus.$on('hideCompanyJobs', function() {
                component.show = false;
            });
        },

        methods: {

            getJobs() {
                let component = this;

                axios.get(component.endpoints.get_jobs, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        
                        component.jobs = response.data.data.posts;
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

            getTimeDiffNow(created_at) {
                return Utils.formatTimeDiffNow(created_at);
            },

        }
    }
</script>