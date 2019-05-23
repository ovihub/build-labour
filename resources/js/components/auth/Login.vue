<template>
    <form method="POST" @submit.prevent="loginUser">
        <div class="form-text-header">Login</div>

        <div class="form-group">
            <input id="email" type="email"  name="email" class="form-control" style="padding-left:24px"
                v-model="input.email" placeholder="Email Address" required autofocus>

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group">
            <password-eye ref-name="loginTogglePassword"></password-eye>
            
            <input id="password" ref="loginTogglePassword" type="password"  name="password" class="form-control" 
                style="padding-left:24px" v-model="input.password" placeholder="Password" required>

            <span class="err-msg" v-if="errors.password">
                {{ errors.password }}
            </span>
        </div>

        <div class="form-group">
            <a class="btn btn-link" v-bind:href="endpoints.reset">
                Forgot Your Password
            </a>

            <button class="pull-right" type="submit" :disabled="disabled">
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
                disabled: false,
                input: {
                    email: '', password: '',
                },
                errors: {
                    email: '', password: '',
                },
                endpoints: {
                    login: '/api/v1/auth/login',
                    user_profile: '/user/profile',
                    company_profile: '/company/profile',
                    reset: '/password/request',
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('loginTogglePassword', function(type) {
                component.$refs['loginTogglePassword'].type = type;
            });
        },

        methods: {

            async loginUser() {
                let component = this;
                
                Utils.setObjectValues(component.errors, '');

                component.disabled = true;

                await axios.post(component.endpoints.login, component.$data.input)
                
                    .then(function(response) {
                        let data = response.data.data;

                        Api.setToken(data.token);

                        if (data.user.role_id == 1) {
                            window.location.href = component.endpoints.user_profile;
                        
                        } else if (data.user.role_id == 2) {
                            window.location.href = component.endpoints.company_profile;
                        }
                    })
                    .catch(function(error) {
                        
                        Utils.setObjectValues(component.input, '');
                        
                        Utils.handleError(error);
                    });
                
                component.disabled = false;
            },
            
        }
    }
</script>