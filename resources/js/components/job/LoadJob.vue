<template>
    <div></div>
</template>

<script>
    export default {
        name: "load-job",
        data() {
            return {
                summary: {
                    id: '', photo_url: '', name: '', address: '', introduction: '',
                },
                job_details: {
                    title: '', description: '', about: '', exp_level: '', contract_type: '', salary: '', reports_to: '', location: ''
                },
                requirements: [],
                responsibilities: [],
                endpoints: {
                    get: '/api/v1/company/',
                },
            }
        },
        created() {
            let component = this;

            if (Utils.getUrlParams().jid) {
                this.endpoints.get = this.endpoints.get + Utils.getUrlParams().cid + '/jobs/' + Utils.getUrlParams().jid;
            
            } else {
                this.endpoints.get = this.endpoints.get + Utils.getUrlParams().cid;
            }
            
            this.getJob();
        },
        methods: {
            getJob() {
                let component = this;

                axios.get(component.endpoints.get, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        if (Utils.getUrlParams().jid) {
                            let job = response.data.data.job;

                            if (job) {
                                if (job.company) {
                                    Bus.$emit('profileAvatarDetails', Utils.getInitials(job.company.name));
                                    
                                    component.summary.id = job.company.id;
                                    component.summary.photo_url = job.company.photo_url;
                                    component.summary.name = job.company.name;
                                    component.summary.address = job.company.address;
                                    component.summary.introduction = job.company.introduction;
                                }
                                
                                component.job_details.job_role = job.job_role;
                                component.job_details.title = job.title;
                                component.job_details.description = job.description;
                                component.job_details.about = job.about;
                                component.job_details.exp_level = job.exp_level;
                                component.job_details.contract_type = job.contract_type;
                                component.job_details.salary = job.salary;
                                component.job_details.reports_to = job.reports_to;
                                component.job_details.location = job.location;
                            
                            } else {
                                component.job_details = null;
                            }

                            Bus.$emit('companySummaryDetails', component.summary, 'view');
                            Bus.$emit('jobDetails', component.job_details);
                            Bus.$emit('jobRequirementsDetails', job.requirements);
                            Bus.$emit('jobResponsibilitiesDetails', job.responsibilities);
                        
                        } else {
                            let company = response.data.data.company;

                            component.summary.id = company.id;
                            component.summary.photo_url = company.photo_url;
                            component.summary.name = company.name;
                            component.summary.address = company.address;
                            component.summary.introduction = company.introduction;
                            
                            component.job_details = null;

                            Bus.$emit('profileAvatarDetails', Utils.getInitials(company.name));
                            Bus.$emit('companySummaryDetails', component.summary, 'new');
                            Bus.$emit('jobDetails', component.job_details);
                        }
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },
        }
    }
</script>