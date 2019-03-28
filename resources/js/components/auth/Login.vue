<template>
    <form method="POST" @submit.prevent="loginUser">

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email"  name="email" class="form-control" v-model="input.email" required autofocus>

                <span class="err-msg" v-if="errors.email">
                    {{ errors.email }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input id="password" type="password"  name="password" class="form-control" v-model="input.password" required>

                <span class="err-msg" v-if="errors.password">
                    {{ errors.password }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                <a class="btn btn-link" v-bind:href="endpoints.reset">
                    Forgot Your Password
                </a>
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
                    password: '',
                },
                errors: {
                    email: '',
                    password: '',
                },
                endpoints: {
                    login: '/api/v1/auth/login',
                    profile: '/user/profile?token=',
                    reset: '/password/request',
                }
            }
        },

        methods: {

            loginUser() {
                var app = this;
                
                app.errors.email = '';
                app.errors.password = '';

                axios.post(app.endpoints.login,
                        app.$data.input)
                    .then(function(response) {
                            let data = response.data;
                            
                            if (data.success) {
                                let token = data.data.token;
                                
                                window.location.href = app.endpoints.profile + token;
                            }
                        })
                    .catch(function(error) {
                            let data = error.response.data;

                            if (! data.success) {

                                if (data.http_status == 500) {
                                    Bus.$emit('alertError', 'An internal error occurred.');
                                }
                                else {
                                    app.input.email = '';
                                    app.input.password = '';

                                    Bus.$emit('alertError', data.message);
                                }
                            }
                        });
            },
            
        }
    }
</script>