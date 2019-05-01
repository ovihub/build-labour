<template>
    <div></div>
</template>

<script>

    import Api from '@/api';
    
    export default {
        data() {
            return {
                avatar: {
                    initials: '', profile_photo_url: '',
                },
                profile: {
                    profile_photo_url: '', first_name: '', last_name: '', email: '', course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_month: '', start_year: '', end_month: '', end_year: '',
                },
                about_me: {
                    gender: '', date_of_birth: '', marital_status: '', english_skill: '', drivers_license: '', has_registered_vehicle: '',
                },
                ideal_role: { 
                    introduction: '', when: '', max_distance: '', state: '', right_to_work: '',
                },
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

                        component.avatar = {};
                        component.avatar.initials = user.first_name.charAt(0) + user.last_name.charAt(0);
                        component.avatar.profile_photo_url = user.profile_photo_url;
                        
                        component.profile = {};
                        component.profile.profile_photo_url = user.profile_photo_url;
                        component.profile.profile_description = user.worker_detail ? user.worker_detail.profile_description : '';
                        component.profile.first_name = user.first_name;
                        component.profile.last_name = user.last_name;
                        component.profile.email = user.email;
                        component.profile.is_verified = user.is_verified;
                        component.profile.address = user.address;
                        component.profile.country = user.country;

                        component.profile.course = user.educations[0] ? user.educations[0].course : '';
                        component.profile.school = user.educations[0] ? user.educations[0].school : '';
                        
                        component.profile.job_role = user.experiences[0] ? user.experiences[0].job_role : '';
                        component.profile.company_name = user.experiences[0] ? user.experiences[0].company_name : '';
                        component.profile.start_month = user.experiences[0] ? user.experiences[0].start_month : '';
                        component.profile.start_year = user.experiences[0] ? user.experiences[0].start_year : '';
                        component.profile.end_month = user.experiences[0] ? user.experiences[0].end_month : '';
                        component.profile.end_year = user.experiences[0] ? user.experiences[0].end_year : '';

                        component.about_me = {};
                        component.about_me.gender = user.gender;
                        component.about_me.date_of_birth = user.date_of_birth;
                        component.about_me.marital_status = user.marital_status;
                        component.about_me.english_skill = user.date_of_birth ? user.worker_detail.english_skill : null;
                        component.about_me.drivers_license = user.date_of_birth ? user.worker_detail.drivers_license : null;
                        component.about_me.has_registered_vehicle = user.date_of_birth ? user.worker_detail.has_registered_vehicle : null;

                        component.ideal_role = user.worker_detail;
                        component.ideal_role.right_to_work = user.date_of_birth ? user.worker_detail.right_to_work : null;
                        component.employments = user.experiences;
                        component.educations = user.educations;
                        component.tickets = user.tickets;
                        component.industry_skills = user.skills;

                        Bus.$emit('avatarDetails', component.avatar);
                        Bus.$emit('userProfileDetails', component.profile);
                        Bus.$emit('aboutMeDetails', component.about_me);
                        Bus.$emit('idealRoleDetails', component.ideal_role);
                        Bus.$emit('employmentDetails', component.employments);
                        Bus.$emit('educationDetails', component.educations);
                        Bus.$emit('ticketsDetails', component.tickets);
                        Bus.$emit('industrySkillsDetails', component.industry_skills, user.worker_detail ? user.worker_detail.main_skill : '');
                    })
                    .catch(function(error) {

                        /** 
                         * NOTE: Please do not delete token if error occurs
                         * Instead, this should be deleted if unauthorized access is returned
                         */
                        // Api.deleteToken();
                        
                        Utils.handleError(error);
                    });
            },

        }
    }
</script>