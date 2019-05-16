<template>
    <div></div>
</template>

<script>
    export default {
        data() {
            return {
                summary: {
                    
                },
                job_details: {
                    description: '', about: '', exp_level: '', contract_type: '', salary: '', reports_to: '', location: ''
                },
                requirements: {
                    
                },
                responsibilities: { 
                    
                },
                endpoints: {
                    get: '/api/v1/company/1/jobs/1',
                },
            }
        },

        created() {
            this.getJob();
        },

        methods: {
            
            getJob() {
                let component = this;

                axios.get(component.endpoints.get, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let job = response.data.data.job;

                        component.job_details.description = job.description;
                        component.job_details.about = job.about;
                        component.job_details.exp_level = job.exp_level;
                        component.job_details.contract_type = job.contract_type;
                        component.job_details.salary = job.salary;
                        component.job_details.reports_to = job.reports_to;
                        component.job_details.location = job.location;

                        Bus.$emit('companySummaryDetails', component.summary);
                        Bus.$emit('jobDetails', component.job_details);
                        Bus.$emit('jobRequirementsDetails', component.requirements);
                        Bus.$emit('jobResponsibilitiesDetails', component.responsibilities);
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

        }
    }
</script>