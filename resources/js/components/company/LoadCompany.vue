<template>
    <div></div>
</template>

<script>
    export default {
        data() {
            return {
                company: {
                    photo_url: '', name: '', address: '', contact_email: '', phone: '', introduction: '', specialization: []
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

                        component.company.photo_url = company.photo_url;
                        component.company.name = company.name;
                        component.company.address = company.address;
                        component.company.contact_email = company.contact_email;
                        component.company.phone = company.phone;
                        component.company.introduction = company.introduction;
                        component.company.specialization = company.specialization;

                        Bus.$emit('companyProfileDetails', component.company);
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

        }
    }
</script>