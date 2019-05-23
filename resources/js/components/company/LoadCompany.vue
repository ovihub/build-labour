<template>
    <div></div>
</template>

<script>
    export default {
        data() {
            return {
                company: {
                    name: '', address: '', contact_email: '', phone: '', introduction: ''
                },
                endpoints: {
                    get: '/api/v1/company/1',
                },
            }
        },

        created() {
            this.getCompany();
        },

        methods: {
            
            getCompany() {
                let component = this;

                axios.get(component.endpoints.get, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let company = response.data.data.company;

                        component.company.name = company.name;
                        component.company.address = company.address;
                        component.company.contact_email = company.contact_email;
                        component.company.phone = company.phone;
                        component.company.introduction = company.introduction;

                        Bus.$emit('companyProfileDetails', component.company);
                        // Bus.$emit('jobDetails', component.job_details);
                        // Bus.$emit('jobRequirementsDetails', component.requirements);
                        // Bus.$emit('jobResponsibilitiesDetails', component.responsibilities);
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

        }
    }
</script>