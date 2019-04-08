<template>
    <form method="POST" @submit.prevent="resetPassword">
        <div class="row justify-content-center">
            Forgot Password
        </div>
        <div class="row justify-content-center">
            Enter your new password for {{ input.email }}
        </div>

        <div class="form-group row">
            <input id="email" type="email" name="email" class="form-control" v-model="input.email" required />

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group row">
            <input id="password" type="password" name="password" class="form-control" v-model="input.password" required />

            <span class="err-msg" v-if="errors.password">
                {{ errors.password }}
            </span>
        </div>

        <div class="form-group row">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="input.password_confirmation" required>
        </div>
        
        <div class="form-group row mb-0">
            <a class="btn btn-link" v-bind:href="endpoints.login">
                Back to login
            </a>
            
            <button type="submit" class="btn btn-primary" :disabled="disabled">
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
                input: {
                    email: '',
                    token: Utils.getUrlParams().token,
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