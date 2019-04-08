<template>
    <form method="POST" @submit.prevent="registerUser">
        <div class="row justify-content-center">
            Registration
        </div>

        <div class="form-group row">
            <input id="first_name" type="text" name="first_name" class="form-control" v-model="input.first_name" placeholder="First Name" required autofocus />

            <span class="err-msg" v-if="errors.first_name">
                {{ errors.first_name }}
            </span>
        </div>

        <div class="form-group row">
            <input id="last_name" type="text" name="last_name" class="form-control" v-model="input.last_name" placeholder="Last Name" required autofocus />

            <span class="err-msg" v-if="errors.last_name">
                {{ errors.last_name }}
            </span>
        </div>

        <div class="form-group row">
            <img class="auth-mobile-icon" src="/img/icons/au.png"
                    srcset="/img/icons/au@2x.png 2x, /img/icons/au@3x.png 3x">
            +61
            
            <input id="mobile_number" type="text" name="mobile_number" class="form-control" v-model="input.mobile_number" placeholder="Mobile Number" required />

            <span class="err-msg" v-if="errors.mobile_number">
                {{ errors.mobile_number }}
            </span>
        </div>

        <div class="form-group row">
            <input id="email" type="email" name="email" class="form-control" v-model="input.email" placeholder="Email Address" required />

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group row">
            <input id="password" type="password" name="password" class="form-control" v-model="input.password" placeholder="Password" required />

            <span class="err-msg" v-if="errors.password">
                {{ errors.password }}
            </span>
        </div>

        <div class="form-group row">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="input.password_confirmation" placeholder="Confirm Password" required>
        </div>
        
        <!-- <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

            <div class="col-md-7">
                <select v-model="input.role_id" class="form-control">
                    <option v-for="role in roles" v-bind:key="role.id" v-bind:value="role.id">
                        {{ role.name }}
                    </option>
                </select>
            </div>

            <span class="err-msg" v-if="errors.role_id">
                {{ errors.role_id }}
            </span>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Gender</label>

            <div class="col-md-7">
                <select v-model="input.gender" class="form-control">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <span class="err-msg" v-if="errors.role_id">
                {{ errors.role_id }}
            </span>
        </div> -->

        <div class="form-group row mb-0">
            <a class="btn btn-link" v-bind:href="endpoints.login">
                Back to login
            </a>
            
            <button type="submit" class="btn btn-primary" :disabled="disabled">
                Login
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
                    role_id:  1, gender: 'Female', first_name: '', last_name: '', mobile_number: '', email: '', password: '', password_confirmation: ''
                },
                errors: {
                    role_id: '', gender: '', first_name: '', last_name: '', mobile_number: '', email: '', password: '',
                },
                endpoints: {
                    login: '/login',
                    profile: '/user/profile',
                    register: '/api/v1/auth/register',
                    get_roles: '/api/v1/roles',
                }
            }
        },

        created() {
            this.getRoles();
        },

        methods: {
            
            getRoles() {
                let component = this;

                axios.get(component.endpoints.get_roles, Utils.getBearerAuth())
                    
                    .then(function(response) {
                        component.roles = response.data.data.roles;
                    })
                    .catch(function(error) {
                        // let data = error.response.data;

                        Utils.handleError(error);
                    });
            },

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