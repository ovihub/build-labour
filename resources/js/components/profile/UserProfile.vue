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
                            {{ input.period }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div>
        <form method="POST" @submit.prevent="saveProfile">
            <div class="form-group row">
                <label for="role" class="col-md-2 col-form-label text-md-left">Role</label>

                <div class="col-md-7">
                    <input id="role" type="text" name="role" class="form-control" v-model="input.role.name" :disabled="disabled_input" required autofocus />

                    <span class="err-msg" v-if="errors.role">
                        {{ errors.role }}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="first_name" class="col-md-2 col-form-label text-md-left">First Name</label>

                <div class="col-md-7">
                    <input id="first_name" type="text" name="first_name" class="form-control" v-model="input.first_name" :disabled="disabled_input" required autofocus />

                    <span class="err-msg" v-if="errors.first_name">
                        {{ errors.first_name }}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-md-2 col-form-label text-md-left">Last Name</label>

                <div class="col-md-7">
                    <input id="last_name" type="text" name="last_name" class="form-control" v-model="input.last_name" :disabled="disabled_input" required autofocus />

                    <span class="err-msg" v-if="errors.last_name">
                        {{ errors.last_name }}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-left">E-Mail Address</label>

                <div class="col-md-7">
                    <input id="email" type="email" name="email" class="form-control" v-model="input.email" :disabled="disabled_input" required />

                    <span class="err-msg" v-if="errors.email">
                        {{ errors.email }}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="date_of_birth" class="col-md-2 col-form-label text-md-left">Birth Date</label>

                <div class="col-md-7">
                    <datepicker id="date_of_birth" name="date_of_birth" class="form-control" :format="format" v-model="input.date_of_birth"></datepicker>

                    <span class="err-msg" v-if="errors.date_of_birth">
                        {{ errors.date_of_birth }}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="country" class="col-md-2 col-form-label text-md-left">Country</label>

                <div class="col-md-7">
                    <input id="country" type="text" name="country" class="form-control" v-model="input.country" :disabled="disabled_input" required />

                    <span class="err-msg" v-if="errors.country">
                        {{ errors.country }}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label text-md-left">Address</label>

                <div class="col-md-7">
                    <input id="address" type="text" name="address" class="form-control" v-model="input.address" :disabled="disabled_input" required />

                    <span class="err-msg" v-if="errors.address">
                        {{ errors.address }}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="mobile_number" class="col-md-2 col-form-label text-md-left">Mobile Number</label>

                <div class="col-md-7">
                    <input id="mobile_number" type="text" name="mobile_number" class="form-control" v-model="input.mobile_number" :disabled="disabled_input" required />

                    <span class="err-msg" v-if="errors.mobile_number">
                        {{ errors.mobile_number }}
                    </span>
                </div>
            </div>
        </form>
    </div> -->
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        data() {
            return {
                disabled_input: false,
                input: {
                    profile_photo_url: '', profile_description: '', first_name: '', last_name: '', email: '', is_verified: '',
                    course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_date:'', end_date:'', period: '',
                },
                errors: {
                    profile_photo_url: '', profile_description: '', first_name: '', last_name: '', email: '', is_verified: '',
                    course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_date:'', end_date:'', period: '',
                },
                endpoints: {
                    save: '/api/v1/user/update',
                },
                format: 'd MMMM yyyy',
            }
        },

        components: {
            Datepicker
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

            async saveProfile() {
                // TODO: trigger save
                // let component = this;
                
                // Utils.setObjectValues(component.errors, '');

                // await axios.post(component.endpoints.save, component.$data.input, Utils.getBearerAuth())

                //     .then(function(response) {
                //         let data = response.data;
                        
                //         Utils.setObjectValues(component.input, '');

                //         Bus.$emit('alertSuccess', data.message);
                //     })
                //     .catch(function(error) {
                //         let data = error.response.data;

                //         for (let key in component.errors) {
                //             component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                //         }

                //         Utils.handleError(error);
                //     });
            }
            
        }
    }
</script>