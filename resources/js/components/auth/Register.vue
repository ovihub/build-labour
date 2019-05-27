<template>
    <form method="POST" @submit.prevent="registerUser">
        <div class="form-text-header">Registration</div>

        <div class="form-group">
            <input id="first_name" type="text" name="first_name" class="form-control" style="padding-left:24px"
                v-model="input.first_name" placeholder="First Name" required autofocus />

            <span class="err-msg" v-if="errors.first_name">
                {{ errors.first_name }}
            </span>
        </div>

        <div class="form-group">
            <input id="last_name" type="text" name="last_name" class="form-control" style="padding-left:24px"
                v-model="input.last_name" placeholder="Last Name" required autofocus />

            <span class="err-msg" v-if="errors.last_name">
                {{ errors.last_name }}
            </span>
        </div>

        <div class="form-group disp-flex">
            <div class="form-col-1">
                <img class="form-mobile-icon" src="/img/icons/au.png"
                    srcset="/img/icons/au@2x.png 2x, /img/icons/au@3x.png 3x">
                
                <span class="form-col-label">+61</span>
            </div>
            
            <div class="form-col-2">
                <input id="mobile_number" type="text" name="mobile_number" class="form-control" style="padding-left:24px"
                    v-model="input.mobile_number" placeholder="Mobile Number" required />

                <span class="err-msg" v-if="errors.mobile_number">
                    {{ errors.mobile_number }}
                </span>
            </div>
        </div>

        <div class="form-group">
            <input id="email" type="email" name="email" class="form-control" style="padding-left:24px"
                v-model="input.email" placeholder="Email Address" required />

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group">
            <password-eye ref-name="regTogglePassword"></password-eye>
            
            <input id="password" ref="regTogglePassword" type="password" name="password" class="form-control" 
                style="padding-left:24px" v-model="input.password" placeholder="Password" required />

            <span class="err-msg" v-if="errors.password">
                {{ errors.password }}
            </span>
        </div>

        <div class="form-group">
            <password-eye ref-name="regToggleConfirm"></password-eye>

            <input id="password-confirm" ref="regToggleConfirm" type="password" class="form-control"
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
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {

        data() {
            return {
                roles: [],
                disabled: false,
                input: {
                    first_name: '', last_name: '', mobile_number: '', email: '', password: '', password_confirmation: ''
                },
                errors: {
                    first_name: '', last_name: '', mobile_number: '', email: '', password: '',
                },
                endpoints: {
                    login: '/login',
                    profile: '/user/profile',
                    register: '/api/v1/auth/register',
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
            
            async registerUser() {
                let component = this;
                
                Utils.setObjectValues(component.errors, '');

                component.disabled = true;

                await axios.post(component.endpoints.register, component.$data.input)
                    
                    .then(function(response) {
                        let data = response.data;

                        Api.setToken(data.data.token);

                        window.location.href = component.endpoints.profile;
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
                
                component.disabled = false;
            },
        }
    }
</script>