<template>
    <div></div>
</template>

<script>

    import Api from '@/api';
    
    export default {
        data() {
            return {
                profile: {
                    profile_photo_url: '', first_name: '', last_name: '', email: '', course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_date:'', end_date:'', period: '',
                },
                about_me: {
                    gender: '', dob: '', dob_formatted: '', marital_status: '', english_skill: '', drivers_license: ''
                },
                ideal_role: {},
                employments: [],
                educations: [],
                tickets: [],
                industry_skills: [],
                endpoints: {
                    get: '/api/v1/auth/user',
                },
            }
        },

        created() {
            this.getUser();
        },

        methods: {
            
            getUser() {
                let component = this;

                axios.get(component.endpoints.get, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let user = response.data.data.user;

                        component.profile = {};
                        component.profile.profile_photo_url = user.profile_photo_url ? user.profile_photo_url : '/img/icons/default.png';
                        component.profile.profile_description = user.worker_detail ? user.worker_detail.profile_description : '';
                        component.profile.first_name = user.first_name;
                        component.profile.last_name = user.last_name;
                        component.profile.email = user.email;
                        component.profile.is_verified = user.is_verified;
                        component.profile.address = user.address;
                        component.profile.country = user.country;

                        component.profile.course = user.educations[0] ? user.educations[0].course : '';
                        component.profile.school = user.educations[0] ? user.educations[0].school : '';
                        
                        component.profile.role = user.role.name;
                        component.profile.job_role = user.experiences[0] ? user.experiences[0].job_role : '';
                        component.profile.company_name = user.experiences[0] ? user.experiences[0].company_name : '';
                        component.profile.period = user.experiences[0] ? user.experiences[0].period : '';

                        component.about_me = {};
                        component.about_me.gender = user.gender;
                        component.about_me.dob = user.dob;
                        component.about_me.dob_formatted = user.dob ? user.dob_formatted : '';
                        component.about_me.marital_status = user.marital_status;
                        component.about_me.english_skill = user.worker_detail ? user.worker_detail.english_skill : '';
                        component.about_me.drivers_license = user.worker_detail ? user.worker_detail.drivers_license : '';

                        component.ideal_role = user.worker_detail;
                        component.employments = user.experiences;
                        component.educations = user.educations;
                        component.tickets = user.tickets;
                        component.industry_skills = user.skills;

                        Bus.$emit('userProfileDetails', component.profile);
                        Bus.$emit('aboutMeDetails', component.about_me);
                        Bus.$emit('idealRoleDetails', component.ideal_role);
                        Bus.$emit('employmentDetails', component.employments);
                        Bus.$emit('educationDetails', component.educations);
                        Bus.$emit('ticketsDetails', component.tickets);
                        Bus.$emit('industrySkillsDetails', component.industry_skills, user.worker_detail ? user.worker_detail.main_skill : '');
                    })
                    .catch(function(error) {

                        Api.deleteToken();
                        
                        Utils.handleError(error);
                    });
            },

        }
    }
</script>