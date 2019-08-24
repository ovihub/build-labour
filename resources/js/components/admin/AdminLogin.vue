<template>

    <form method="POST" @submit.prevent="loginUser" style="padding-top: 50px">
        <div class="form-text-header">Admin Login</div>

        <div class="form-group">
            <input id="email" type="email"  name="email" class="form-control" style="padding-left:24px"
                v-model="input.email" placeholder="Email Address" required autofocus>

            <span class="err-msg" v-if="errors.email">
                {{ errors.email }}
            </span>
        </div>

        <div class="form-group">

            <input id="password" ref="loginTogglePassword" type="password"  name="password" class="form-control"
                style="padding-left:24px" v-model="input.password" placeholder="Password" required>

            <span class="err-msg" v-if="errors.password">
                {{ errors.password }}
            </span>
        </div>

        <div class="form-group" style="text-align: center">
            <button type="submit" :disabled="disabled">
                Login
            </button>
        </div>
    </form>
</template>

<script>
    import Api from '@/api';

    export default {
        name: "admin-login",
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
                    login: '/api/v1/admin/auth/login',
                    profile: '/admin'
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

                component.disabled = true;

                await axios.post(component.endpoints.login, component.$data.input)

                    .then(function(response) {
                        let data = response.data;

                        Api.setToken(data.data.token);

                        window.location.href = component.endpoints.profile;
                    })
                    .catch(function(error) {

                        Utils.setObjectValues(component.input, '');

                        Utils.handleError(error);
                    });

                component.disabled = false;
            },
        },
    }
</script>