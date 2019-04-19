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
                    role: '', company_name: '', job_role: '', start_date:'', end_date:'', period: '',
                },
                about_me: {
                    gender: '', date_of_birth: '', marital_status: '', english_skill: '', drivers_license: ''
                },
                ideal_role: { 
                    introduction: '', when: '', max_distance: '', address: '',  state: '', right_to_work: '',
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
                        
                        component.profile.role = user.role.name;
                        component.profile.job_role = user.experiences[0] ? user.experiences[0].job_role : '';
                        component.profile.company_name = user.experiences[0] ? user.experiences[0].company_name : '';
                        component.profile.start_date = user.experiences[0] ? user.experiences[0].start_date : '';
                        component.profile.end_date = user.experiences[0] ? user.experiences[0].end_date : '';

                        component.about_me = {};
                        component.about_me.gender = user.gender;
                        component.about_me.date_of_birth = user.date_of_birth;
                        component.about_me.marital_status = user.marital_status;
                        component.about_me.english_skill = user.worker_detail ? user.worker_detail.english_skill : '';
                        component.about_me.drivers_license = user.worker_detail ? user.worker_detail.drivers_license : '';

                        if (user.worker_detail) {
                            component.ideal_role.introduction = user.worker_detail.introduction;
                            component.ideal_role.when = user.worker_detail.when;
                            component.ideal_role.max_distance = user.worker_detail.max_distance;
                            component.ideal_role.address = user.worker_detail.address;
                            component.ideal_role.state = user.worker_detail.state;
                            component.ideal_role.right_to_work = user.worker_detail.right_to_work;

                        } else {
                            Utils.setObjectValues(component.ideal_role,  '');
                        }

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
                         * Instead, this should deleted if unauthorized access is returned
                         */
                        // Api.deleteToken();
                        
                        Utils.handleError(error);
                    });
            },

        }
    }
</script>