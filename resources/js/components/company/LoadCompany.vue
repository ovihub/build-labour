<template>
    <div></div>
</template>

<script>
    export default {
        data() {
            return {
                company: {
                    photo_url: '', name: '', business_type: '', tier: '',
                    address: '', website: '', phone: '', introduction: '',
                    main_function: '', specialization: []
                },
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
                return this.endpoints.get + this.companyId;
            }
        },

        created() {
            this.getCompany();
        },

        methods: {
            
            getCompany() {
                let component = this;

                axios.get(component.endpointGet, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let company = response.data.data.company;

                        component.company.photo_url = company.photo_url;
                        component.company.name = company.name;
                        component.company.business_type = company.business_type;
                        component.company.tier = company.tier;
                        component.company.address = company.address;
                        component.company.website = company.website;
                        component.company.phone = company.phone;
                        component.company.introduction = company.introduction;
                        component.company.main_function = company.main_function;
                        component.company.main_function_answer = company.main_function_answer;
                        component.company.specialization = company.specialization;

                        Bus.$emit('profileAvatarDetails', Utils.getInitials(company.name));
                        Bus.$emit('companyProfileDetails', component.company);
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

        }
    }
</script>