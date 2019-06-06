<template>
    <div class="profile-item-2" v-if="show">
        <div class="job-action">
            <div class="job-filter">
                Filter
            </div>
            <div class="job-sort">
                Sort by: <span class="job-recent">Most Recent</span>
            </div>
        </div>
        <job-posts :company-id="companyId"></job-posts>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false,
                jobs: [],
                endpoints: {
                    get: '/api/v1/company/',
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

            getInitials(name) {
                return Utils.getInitials(name);
            },

            getJobs() {
                let component = this;

                axios.get(component.endpointGet, Utils.getBearerAuth())
                    
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