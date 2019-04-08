<template>
    <form method="POST" @submit.prevent="loginUser">
        <div class="row justify-content-center">
            Login
        </div>

        <div class="form-group row">
            <input id="email" type="email"  name="email" class="form-control" v-model="input.email" placeholder="Email Address" required autofocus>

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group row">
            <input id="password" type="password"  name="password" class="form-control" v-model="input.password" placeholder="Password" required>

            <span class="err-msg" v-if="errors.password">
                {{ errors.password }}
            </span>
        </div>

        <div class="form-group row">
            <div class="form-check"></div>
        </div>

        <div class="form-group row mb-0">
            <a class="btn btn-link" v-bind:href="endpoints.reset">
                Forgot Your Password
            </a>
            
            <button type="submit" class="btn btn-primary" :disabled="disabled">
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
                    profile: '/user/profile',
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

                        Api.setToken(data.data.token);
                        
                        window.location.href = component.endpoints.profile;
                    })
                    .catch(function(error) {
                        // let data = error.response.data;

                        Utils.setObjectValues(component.input, '');
                        
                        Utils.handleError(error);
                    });
                
                component.disabled = false;
            },
            
        }
    }
</script>