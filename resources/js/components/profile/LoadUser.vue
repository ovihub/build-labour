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
                    profile_description: '', profile_photo_url: '', first_name: '', last_name: '', email: '', is_verified: '',
                    sectors: [], tiers: [], address: '', education_id: '',
                    company_id: '', company_photo: '', company_name: '', job_role: '',
                    start_month: '', start_year: '', end_month: '', end_year: '',
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
                    get_user: '/api/v1/worker/view/'
                },
            }
        },

        props: {
            userId: {
                type: String,
                required: false
            },
        },

        computed: {
            endpointGet() {
                return this.userId ? this.endpoints.get_user + this.userId : this.endpoints.get;
            }
        },

        created() {
            this.getUser();
        },

        methods: {
            
            getUser() {
                let component = this;

                axios.get(component.endpointGet, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        let user = response.data.data.user;

                        component.profile = {};
                        component.profile.profile_photo_url = user.profile_photo_url;
                        component.profile.profile_description = user.worker_detail ? user.worker_detail.profile_description : '';
                        component.profile.first_name = user.first_name;
                        component.profile.last_name = user.last_name;
                        component.profile.email = user.email;
                        component.profile.is_verified = user.is_verified;
                        component.profile.address = user.address;
                        component.profile.education_id = user.worker_detail.education_id;
                        component.profile.education = user.worker_detail.education;
                        component.profile.sectors = user.worker_detail.sectors;
                        component.profile.tiers = user.worker_detail.tiers;
                        component.profile.job_role = (user.experiences[0] && user.experiences[0].job) ?
                                                        user.experiences[0].job.title :
                                                        (user.experiences[0]) ? user.experiences[0].job_role : '';
                        component.profile.company_id = (user.experiences[0] && user.experiences[0].company) ? 
                                                            user.experiences[0].company.id : '';
                        component.profile.company_photo = (user.experiences[0] && user.experiences[0].company) ? 
                                                            user.experiences[0].company.photo_url : '';
                        component.profile.company_name = (user.experiences[0] && user.experiences[0].company) ? 
                                                            user.experiences[0].company.name : 
                                                            (user.experiences[0]) ? user.experiences[0].company_name : '';
                        component.profile.start_month = user.experiences[0] ? user.experiences[0].start_month : '';
                        component.profile.start_year = user.experiences[0] ? user.experiences[0].start_year : '';
                        component.profile.end_month = user.experiences[0] ? user.experiences[0].end_month : '';
                        component.profile.end_year = user.experiences[0] ? user.experiences[0].end_year : '';

                        component.about_me = {};
                        component.about_me.gender = user.gender;
                        component.about_me.date_of_birth = user.date_of_birth;
                        component.about_me.marital_status = user.marital_status;
                        component.about_me.english_skill = user.worker_detail.english_skill;
                        component.about_me.drivers_license = user.worker_detail.drivers_license;
                        component.about_me.has_registered_vehicle = user.worker_detail.has_registered_vehicle;

                        component.ideal_role = user.worker_detail;
                        component.ideal_role.right_to_work = user.worker_detail.right_to_work;
                        component.employments = user.experiences;
                        component.educations = user.educations;
                        component.tickets = user.tickets;
                        component.industry_skills = user.skills;

                        Bus.$emit('profileAvatarDetails', Utils.getInitials(user.full_name));
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