<template>
    <div></div>
</template>

<script>
    export default {
        data() {
            return {
                summary: {
                    photo_url: '', name: '', address: '', introduction: '',
                },
                job_details: {
                    title: '', description: '', about: '', exp_level: '', contract_type: '', salary: '', reports_to: '', location: ''
                },
                requirements: [],
                responsibilities: [],
                endpoints: {
                    get: '',
                },
            }
        },

        created() {
            let component = this;

            this.endpoints.get = '/api/v1/company/' + Utils.getUrlParams().cid + '/jobs/' + Utils.getUrlParams().jid;
            this.getJob();
        },

        methods: {
            
            getJob() {
                let component = this;

                axios.get(component.endpoints.get, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let job = response.data.data.job;

                        if (job.company) {
                            component.summary.photo_url = job.company.photo_url;
                            component.summary.name = job.company.name;
                            component.summary.location = job.company.location;
                            component.summary.introduction = job.company.introduction;
                        }
                        
                        component.job_details.title = job.title;
                        component.job_details.description = job.description;
                        component.job_details.about = job.about;
                        component.job_details.exp_level = job.exp_level;
                        component.job_details.contract_type = job.contract_type;
                        component.job_details.salary = job.salary;
                        component.job_details.reports_to = job.reports_to;
                        component.job_details.location = job.location;

                        Bus.$emit('companySummaryDetails', component.summary);
                        Bus.$emit('jobDetails', component.job_details);
                        Bus.$emit('jobRequirementsDetails', job.requirements);
                        Bus.$emit('jobResponsibilitiesDetails', job.responsibilities);
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

        }
    }
</script>