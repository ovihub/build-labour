<template>
    <form method="POST" @submit.prevent="sendResetPasswordLink">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-7">
                <input id="email" type="email" name="email" class="form-control" v-model="input.email" required />

                <span class="err-msg" v-if="errors.email">
                    {{ errors.email }}
                </span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-4">
                <button type="submit" class="btn btn-primary" :disabled="disabled">
                    Send Reset Password Link
                </button>
            </div>
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
                        let data = error.response.data;

                        component.errors.email = data.errors.email ? data.errors.email[0] : '';

                        Utils.handleError(data);
                    });
                
                component.disabled = false;
            }
            
        }
    }
</script>