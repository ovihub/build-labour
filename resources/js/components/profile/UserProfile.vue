<template>
    <div class="profile-item-1">
        <div class="profile-header">
            <img class="profile-picture" v-bind:src="input.profile_photo_url">
        </div>
        <div class="profile-content">
            <div class="profile-name m0">{{ input.first_name }} {{ input.last_name }}</div>
        
            <div class="profile-role">
                {{ input.job_role }} - {{ input.company_name }}
            </div>
            
            <div class="profile-display">
                <span class="profile-address">
                    <img class="text-icon" src="/img/icons/pinlocation.png"
                        srcset="/img/icons/pinlocation@2x.png 2x, /img/icons/pinlocation@3x.png 3x">
                    {{ input.address }} {{ input.country }}
                </span>

                <div class="profile-education">
                    <img class="text-icon" src="/img/icons/dollarsign.png"
                        srcset="/img/icons/dollarsign@2x.png 2x, /img/icons/dollarsign@3x.png 3x">

                    Studied <b>{{ input.course }}</b> - {{ input.school }}
                    <!-- <span class="text-style-1">{{ input.school }}</span> -->
                </div>
            </div>
            
            <div class="profile-display">
                <div class="profile-experience">
                    Experienced Senior Project Manager;
                    demonstrated history of working on a wide range
                    of construction projects for leading companies.
                </div>
            </div>
            
            <span class="profile-role-header">Current Role</span>

            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <img class="profile-role-image" src="/img/logo/1.jpg">
                </div>
                <div class="col-md-9 col-sm-9">
                    <span class="profile-role-name">
                        {{ input.job_role }}
                    </span>
                    <span class="profile-label mt-0 pt-0">
                        {{ input.company_name }}
                    </span>
                    <span class="profile-text">
                        {{ input.period }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- <div>
        <main-modal id="verifyEmailModal">
            <template slot="custom-modal-title">
                <h4 class="modal-title">Verify Email</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </template>

            <template slot="custom-modal-content">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-7">
                        <span class="form-control">{{ input_verify.email }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Verification Code</label>
                    
                    <div class="col-md-7">
                        <input id="verification_code" type="text" name="verification_code" class="form-control" v-model="input_verify.verification_code" :disabled="disabled_input" required autofocus />
                    </div>
                </div>

                <button type="button" class="btn btn-primary" @click="verifyEmail" :disabled="disabled_verify">
                    Submit
                </button>
            </template>
        </main-modal>

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
                <label for="dob" class="col-md-2 col-form-label text-md-left">Birth Date</label>

                <div class="col-md-7">
                    <datepicker id="dob" name="dob" class="form-control" :format="format" v-model="input.dob"></datepicker>

                    <span class="err-msg" v-if="errors.dob">
                        {{ errors.dob }}
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
            
            <div class="form-group row mb-0">
                <div class="col-md-7 offset-md-4">
                    <button type="button" class="btn btn-primary" @click="resendEmail" :disabled="disabled_resend">
                        Resend Verification Code
                    </button>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifyEmailModal" :disabled="disabled_verify">
                        Verify Email
                    </button>
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
                disabled_resend: false,
                disabled_verify: false,
                input_resend: {
                    email: '',
                },
                input_verify: {
                    uid: 0, email: '', verification_code: '',
                },
                input: {
                    profile_photo_url: '', first_name: '', last_name: '', email: '', course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_date:'', end_date:'', period: '',
                },
                errors: {
                    profile_photo_url: '', first_name: '', last_name: '', email: '', course: '', school: '', country: '', address: '',
                    role: '', company_name: '', job_role: '', start_date:'', end_date:'', period: '',
                },
                endpoints: {
                    save: '/api/v1/user/update',
                    verify: '/api/v1/auth/verify',
                    resend: '/api/v1/auth/verification/resend',
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

                component.input_resend.email = component.input.email;
                component.input_verify.email = component.input.email;
                component.input_verify.uid = component.input.id;
            });
        },

        methods: {
            
            async resendEmail() {
                let component = this;
                
                component.disabled_resend = true;

                await axios.post(component.endpoints.resend, component.$data.input_resend, Utils.getBearerAuth())

                    .then(function(response) {
                        let data = response.data;
                        
                        Bus.$emit('alertSuccess', data.message);
                    })
                    .catch(function(error) {
                        // let data = error.response.data;

                        Utils.handleError(error);
                    });
                
                component.disabled_resend = false;
            },

            async verifyEmail() {
                let component = this;
                
                component.disabled_verify = true;

                await axios.post(component.endpoints.verify, component.$data.input_verify, Utils.getBearerAuth())

                    .then(function(response) {
                        let data = response.data;
                        
                        Bus.$emit('alertSuccess', data.message);

                        $('#verifyEmailModal').modal('hide');
                    })
                    .catch(function(error) {
                        // let data = error.response.data;

                        Utils.handleError(error);
                    });
                
                component.disabled_verify = false;
            },

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