<template>
    <form method="POST" @submit.prevent="resetPassword">
        <div class="form-text-header">Reset Password</div>
        
        <div class="form-text">
            Enter your new password for {{ email_formatted }}
        </div>

        <div class="form-group">
            <input id="password" type="password" name="password" class="form-control" v-model="input.password" placeholder="Password" required />

            <span class="err-msg" v-if="errors.password">
                {{ errors.password }}
            </span>
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="input.password_confirmation" placeholder="Confirm Password" required>
        </div>
        
        <div class="form-group">
            <a class="btn btn-link" v-bind:href="endpoints.login">
                Back to login
            </a>
            
            <button class="pull-right" type="submit" :disabled="disabled">
                Done
            </button>
        </div>
    </form>
</template>

<script>
    export default {

        data() {
            return {
                disabled: false,
                email_formatted: '',
                input: {
                    email: '',
                    token: '',
                    password: '',
                    password_confirmation: ''
                },
                errors: {
                    email: '',
                    password: '',
                },
                endpoints: {
                    login: '/login',
                    reset: '/api/v1/password/reset'
                }
            }
        },

        created() {
            this.input.email = Utils.getUrlParams().email;
            this.input.token = Utils.getUrlParams().token;
            
            let split = this.input.email.split('@', 2),
                first = split[0],
                second = '@' + split[1];

            this.email_formatted = first.charAt(0).toUpperCase() + first.substr(0, 3).slice(1) + first.substr(3).replace(/./g, '*') + second;
        },

        methods: {
            
            async resetPassword() {
                let component = this;
                
                Utils.setObjectValues(component.errors, '');

                component.disabled = true;

                await axios.post(component.endpoints.reset, component.$data.input)
                    
                    .then(function(response) {
                        let data = response.data;
                        
                        window.location.href = component.endpoints.login;

                        Bus.$emit('alertSuccess', data.message);
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
            }
            
        }
    }
</script>