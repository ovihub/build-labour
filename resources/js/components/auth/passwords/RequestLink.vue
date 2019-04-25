<template>
    <form method="POST" @submit.prevent="sendResetPasswordLink">
        <div class="form-text-header">Forgot Password</div>

        <div class="form-text">
            Enter your Email Address to receive an email with a link to reset your password
        </div>

        <div class="form-group">
            <input id="email" type="email" name="email" class="form-control" style="padding-left:24px"
                v-model="input.email" placeholder="Email Address" required />

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group">
            <a class="btn btn-link" v-bind:href="endpoints.login">
                Back to login
            </a>
            
            <button class="pull-right" type="submit" :disabled="disabled">
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
                        if (error.response) {
                            let data = error.response.data;

                            component.errors.email = data.errors.email ? data.errors.email[0] : '';
                        }

                        Utils.handleError(error);
                    });
                
                component.disabled = false;
            }
            
        }
    }
</script>