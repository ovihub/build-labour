<template>
    <div></div>
</template>

<script>
    export default {
        data() {
            return {
                company: {
                    photo_url: '', name: '', address: '', website: '', phone: '', introduction: '', specialization: []
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

                        let initials = company.name.split(' ');
                        
                        component.avatar = {};
                        component.avatar.initials = initials[0].charAt(0) + initials[initials.length-1].charAt(0);
                        component.avatar.profile_photo_url = company.photo_url;

                        component.company.photo_url = company.photo_url;
                        component.company.name = company.name;
                        component.company.sector = company.sector;
                        component.company.address = company.address;
                        component.company.website = company.website;
                        component.company.phone = company.phone;
                        component.company.introduction = company.introduction;
                        component.company.specialization = company.specialization;

                        Bus.$emit('avatarDetails', component.avatar);
                        Bus.$emit('companyProfileDetails', component.company);
                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    });
            },

        }
    }
</script>