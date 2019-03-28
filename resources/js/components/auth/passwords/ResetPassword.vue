<template>
    <form method="POST" @submit.prevent="resetPassword">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-7">
                <input id="email" type="email" name="email" class="form-control" v-model="input.email" required />

                <span class="err-msg" v-if="errors.email">
                    {{ errors.email }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-7">
                <input id="password" type="password" name="password" class="form-control" v-model="input.password" required />

                <span class="err-msg" v-if="errors.password">
                    {{ errors.password }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

             <div class="col-md-7">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="input.password_confirmation" required>
            </div>
        </div>
        
        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Reset Password
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {

        data() {
            return {
                input: {
                    email: '',
                    token: Helper.methods.getUrlParams().token,
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
            
            resetPassword() {
                var app = this;
                
                app.errors.email = '';
                app.errors.password = '';

                axios.post(app.endpoints.reset,
                        app.$data.input)
                    .then(function(response) {
                            let data = response.data;
                            
                            if (data.success) {
                                window.location.href = app.endpoints.login;

                                Bus.$emit('alertSuccess', data.message);
                            }
                        })
                    .catch(function(error) {
                            let data = error.response.data;

                            if (! data.success) {

                                if (data.http_status == 500) {
                                    Bus.$emit('alertError', 'An internal error occurred.');
                                }
                                else {
                                    app.errors.email = data.errors.email ? data.errors.email[0] : '';
                                    app.errors.password = data.errors.password ? data.errors.password[0] : '';

                                    app.input.password = '';
                                    app.input.password_confirmation = '';

                                    Bus.$emit('alertError', 'Invalid input! Please see errors below.');
                                }
                            }
                        });
            }
            
        }
    }
</script>