<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <div class="profile-header">
                <img v-if="input.profile_photo_url" class="profile-picture" v-bind:src="input.profile_photo_url" alt="">
                <div v-else>
                    <avatar cls="profile-picture" size="110" border="7"></avatar>
                </div>
            </div>
            <div class="profile-content-p20 pb-4">
                <div class="bl-label-22 m0">{{ input.first_name }} {{ input.last_name }}</div>
            
                <div class="bl-label-17 pb-3" v-if="input.job_role">
                    {{ input.job_role }} <div class="text-style-1">- {{ input.company_name }}</div>
                </div>
                
                <div class="bl-display" v-if="input.address">
                    <div class="row bl-label-15">
                        <div class="bl-col-3">
                            <img class="text-icon-3" src="/img/icons/pinlocation.png"
                                srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                        </div>
                        <div class="bl-col-4">
                            {{ input.address }}
                        </div>
                    </div>

                    <div class="row bl-label-15 bl-mb24">
                        <div class="bl-col-3">
                            <img class="text-icon-4" src="/img/icons/smalleducation.png"
                                srcset="/img/icons/smalleducation@2x.png 2x, /img/icons/smalleducation@3x.png 3x">
                        </div>
                        <div class="bl-col-4">
                            Studied <b>{{ input.course }}</b> <div class="text-style-1">- {{ input.school }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="bl-display">
                    <div class="bl-label-15-style-2 bl-mb20">
                        {{ input.profile_description }}
                    </div>
                </div>
                
                <span class="profile-role-header" v-if="input.job_role">Current Role</span>

                <div class="row" v-if="input.job_role">
                    <img class="bl-image-56" src="/img/logo/1.jpg">
                    <div class="bl-display">
                        <span class="bl-label-16 bl-ml15">
                            {{ input.job_role }}
                        </span>
                        <span class="bl-label-15 bl-ml15 mt-0 pt-0">
                            {{ input.company_name }}
                        </span>
                        <span class="bl-label-14 bl-ml15">
                            {{ getPeriod(input.start_date, input.end_date) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                disabled_input: false,
                input: {
                    profile_photo_url: '', profile_description: '', first_name: '', last_name: '', email: '', is_verified: '',
                    course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_date:'', end_date:'',
                },
                errors: {
                    profile_photo_url: '', profile_description: '', first_name: '', last_name: '', email: '', is_verified: '',
                    course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_date:'', end_date:'',
                },
                endpoints: {
                    save: '/api/v1/user/update',
                },
                format: 'd MMMM yyyy',
            }
        },

        created() {
            let component = this;

            Bus.$on('userProfileDetails', function(details) {
                component.input = details;
                
                if (! component.input.is_verified) {
                    Bus.$emit('alertVerify', component.input.email);
                }
            });
        },

        methods: {

            getPeriod(start, end) {
                return Utils.getPeriod(start, end);
            },
            
        }
    }
</script>