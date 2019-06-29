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

            <div class="loading">
                <pulse-loader :loading="loading" color="#ff7705" size="8px"></pulse-loader>
            </div>
        </div>
    </form>
</template>

<script>

    import Api from '@/api';

    export default {
        data() {
            return {
                loading: false,
                disabled: false,
                input: {
                    email: '', password: '',
                },
                errors: {
                    email: '', password: '',
                },
                endpoints: {
                    login: '/api/v1/auth/login',
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

                this.loading = true;
                this.disabled = true;

                await axios.post(component.endpoints.login, component.$data.input)
                
                    .then(function(response) {
                        let initials,
                            profile_photo_url,
                            data = response.data.data,
                            user = data.user;

                        Api.setToken(data.token);

                        if (user.role_id == 1) {
                            initials = user.first_name.charAt(0) + user.last_name.charAt(0);
                            profile_photo_url = user.profile_photo_url;

                        } else if (user.role_id == 2) {
                            initials = Utils.getInitials(user.company_name);
                            profile_photo_url = user.company_photo;
                        }

                        if (profile_photo_url) {
                            Api.setNavAvatar('', profile_photo_url);
                            
                        } else {
                            Api.setNavAvatar(initials, '');
                        }

                        Api.redirectToProfile();
                    })
                    .catch(function(error) {
                        
                        Utils.setObjectValues(component.input, '');
                        
                        Utils.handleError(error);
                    });
                
                this.loading = false;
                this.disabled = false;
            },
            
        }
    }
</script>