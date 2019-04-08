<template>
    <form method="POST" @submit.prevent="sendResetPasswordLink">
        <div class="row justify-content-center">
            Forgot Password
        </div>
        <div class="row justify-content-center">
            Enter your Email Address to receive an email with a link to reset your password
        </div>

        <div class="form-group row">
            <input id="email" type="email" name="email" class="form-control" v-model="input.email" placeholder="Email Address" required />

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group row mb-0">
            <a class="btn btn-link" v-bind:href="endpoints.login">
                Back to login
            </a>
            
            <button type="submit" class="btn btn-primary" :disabled="disabled">
                Send Reset
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
                },
                errors: {
                    email: '',
                },
                endpoints: {
                    login: '/login',
                    send: '/api/v1/password/email'
                }
            }
        },

        methods: {
            
            async sendResetPasswordLink() {
                let component = this;
                
                component.errors.email = '';
                
                component.disabled = true;

                await axios.post(component.endpoints.send, component.$data.input)

                    .then(function(response) {
                        let data = response.data;
                        
                        component.input.email = '';

                        Bus.$emit('alertSuccess', data.message);
                    })
                    .catch(function(error) {
                        // let data = error.response.data;

                        component.errors.email = data.errors.email ? data.errors.email[0] : '';

                        Utils.handleError(error);
                    });
                
                component.disabled = false;
            }
            
        }
    }
</script>