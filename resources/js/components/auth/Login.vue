<template>
    <form method="POST" @submit.prevent="loginUser">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-7">
                <input id="email" type="email"  name="email" class="form-control" v-model="input.email" required autofocus>

                <span class="err-msg" v-if="errors.email">
                    {{ errors.email }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-7">
                <input id="password" type="password"  name="password" class="form-control" v-model="input.password" required>

                <span class="err-msg" v-if="errors.password">
                    {{ errors.password }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-7 offset-md-4">
                <div class="form-check"></div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-4">
                <button type="submit" class="btn btn-primary" :disabled="disabled">
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
                disabled: false,
                input: {
                    email: '', password: '',
                },
                errors: {
                    email: '', password: '',
                },
                endpoints: {
                    login: '/api/v1/auth/login',
                    profile: '/user/profile?token=',
                    reset: '/password/request',
                }
            }
        },

        methods: {

            async loginUser() {
                let component = this;
                
                Utils.setObjectValues(component.errors, '');

                component.disabled = true;

                await axios.post(component.endpoints.login, component.$data.input)
                
                    .then(function(response) {
                        let data = response.data;
                        
                        window.location.href = component.endpoints.profile + data.data.token;
                    })
                    .catch(function(error) {
                        let data = error.response.data;

                        Utils.setObjectValues(component.input, '');
                        
                        Utils.handleError(data);
                    });
                
                component.disabled = false;
            },
            
        }
    }
</script>