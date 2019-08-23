<template>
    <form method="POST" @submit.prevent="registerUser">
        <div class="form-text-header">Registration</div>

        <div class="me-row">
            <div class="role-col-left">
                <!-- <div class="emp-form-label" v-if="input.first_name">First Name</div> -->

                <input id="first_name" type="text" name="first_name" class="form-control" style="padding-left:24px"
                    @focus="hasFocus(false)"
                    v-model="input.first_name" placeholder="First Name" required autofocus />

                <span class="err-msg" v-if="errors.first_name">
                    {{ errors.first_name }}
                </span>
            </div>

            <div class="role-col-right">
                <!-- <div class="emp-form-label" v-if="input.last_name">Last Name</div> -->

                <input id="last_name" type="text" name="last_name" class="form-control" style="padding-left:24px"
                    @focus="hasFocus(false)"
                    v-model="input.last_name" placeholder="Last Name" required autofocus />

                <span class="err-msg" v-if="errors.last_name">
                    {{ errors.last_name }}
                </span>
            </div>
        </div>

        <div class="form-group">
            <!-- <div class="form-col-1">
                <img class="form-mobile-icon" src="/img/icons/au.png"
                    srcset="/img/icons/au@2x.png 2x, /img/icons/au@3x.png 3x">
                
                <span class="form-col-label">+61</span>
            </div>
            
            <div class="form-col-2"> -->
                <!-- <div class="emp-form-label" v-if="input.mobile_number">Mobile Number</div> -->

                <input id="mobile_number" type="text" name="mobile_number" class="form-control" style="padding-left:24px"
                    @focus="hasFocus(false)"
                    v-model="input.mobile_number" placeholder="Mobile Number" required />

                <span class="err-msg" v-if="errors.mobile_number">
                    {{ errors.mobile_number }}
                </span>
            <!-- </div> -->
        </div>

        <div class="emp-row">
            <!-- <div class="emp-form-label" v-if="input.most_recent_role">Most Recent Role</div> -->

            <input class="form-control" type="text" placeholder="Most Recent Role"
                style="padding-left:24px"
                v-model="input.most_recent_role"
                @focus="hasFocus(true)"
                @keyup="onSearchJob(input.most_recent_role)" />
            
            <span class="err-msg" v-if="errors.most_recent_role">
                {{ errors.most_recent_role }}
            </span>
        </div>

        <div class="emp-row" style="margin-top:0" v-if="has_focus && job_roles && job_roles.length > 0">
            <ul class="list-group">
                <li class="list-group-item" v-for="(job, idx) in job_roles" :key="idx"
                    @click="onSelectJob(job)">
                    
                    {{ job.job_role_name }}
                </li>
            </ul>
        </div>

        <div class="form-group">
            <!-- <div class="emp-form-label" v-if="input.suburb">Suburb</div> -->

            <input id="suburb" type="text" name="suburb" class="form-control" style="padding-left:24px"
                @focus="hasFocus(false)"
                v-model="input.suburb" placeholder="Suburb" required />

            <span class="err-msg" v-if="errors.suburb">
                {{ errors.suburb }}
            </span>
        </div>

        <div class="form-group">
            <!-- <div class="emp-form-label" v-if="input.email">Email Address</div> -->

            <input id="email" type="email" name="email" class="form-control" style="padding-left:24px"
                @focus="hasFocus(false)"
                v-model="input.email" placeholder="Email Address" required />

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group">
            <password-eye ref-name="regTogglePassword"></password-eye>
            
            <!-- <div class="emp-form-label" v-if="input.password">Password</div> -->
            
            <input id="password" ref="regTogglePassword" type="password" name="password" class="form-control" 
                @focus="hasFocus(false)"
                style="padding-left:24px" v-model="input.password" placeholder="Password" required />

            <span class="err-msg" v-if="errors.password">
                {{ errors.password }}
            </span>
        </div>

        <div class="form-group">
            <password-eye ref-name="regToggleConfirm"></password-eye>
            
            <!-- <div class="emp-form-label" v-if="input.password_confirmation">Confirm Password</div> -->

            <input id="password-confirm" ref="regToggleConfirm" type="password" class="form-control"
                @focus="hasFocus(false)"
                style="padding-left:24px" name="password_confirmation" v-model="input.password_confirmation"
                placeholder="Confirm Password" required>
        </div>

        <div class="form-group">
            <a class="btn btn-link" v-bind:href="endpoints.login">
                Back to login
            </a>
            
            <button class="pull-right" type="submit" :disabled="disabled">
                Sign Up
            </button>
            
            <div class="loading">
                <pulse-loader :loading="loading" color="#00aeef" size="8px"></pulse-loader>
            </div>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                roles: [],
                job_roles: [],
                has_focus: false,
                loading: false,
                disabled: false,
                input: {
                    first_name: '', last_name: '', mobile_number: '', most_recent_role: '', suburb: '',
                    email: '', password: '', password_confirmation: ''
                },
                errors: {
                    first_name: '', last_name: '', mobile_number: '', most_recent_role: '', suburb: '',
                    email: '', password: '',
                },
                endpoints: {
                    login: '/login',
                    register: '/api/v1/auth/register',
                    onboarding: '/user/onboarding',
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('regTogglePassword', function(type) {
                component.$refs['regTogglePassword'].type = type;
            });

            Bus.$on('regToggleConfirm', function(type) {
                component.$refs['regToggleConfirm'].type = type;
            });
        },

        methods: {

            hasFocus(has_focus) {
                this.has_focus = has_focus;
            },
            
            onSearchJob(keyword) {
                if (keyword != '' && (keyword && keyword.length > 0)) {
                    this.job_roles = Api.getJobRoles(keyword);

                } else {
                    this.job_roles = [];
                }
            },

            onSelectJob(job) {
                this.input.most_recent_role = job.job_role_name;

                this.job_roles = [];
            },

            async registerUser() {
                let component = this;
                
                Utils.setObjectValues(component.errors, '');

                this.loading = true;
                this.disabled = true;

                await axios.post(component.endpoints.register, component.$data.input)
                    
                    .then(function(response) {
                        let data = response.data;

                        Api.setToken(data.data.token);

                        Api.setNavAvatar(data.data.user.first_name.charAt(0) + data.data.user.last_name.charAt(0), '');

                        window.location.href = component.endpoints.onboarding;
                    })
                    .catch(function(error) {
                        if (error.response) {
                            let data = error.response.data;

                            for (let key in component.errors) {
                                component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                            }
                        }

                        Utils.handleError(error);
                    });
                
                this.loading = false;
                this.disabled = false;
            },
        }
    }
</script>