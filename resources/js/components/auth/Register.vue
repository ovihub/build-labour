<template>
    <form method="POST" @submit.prevent="registerUser">

        <div class="form-group row">
            <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

            <div class="col-md-7">
                <input id="first_name" type="text" name="first_name" class="form-control" v-model="input.first_name" required autofocus />

                <span class="err-msg" v-if="errors.first_name">
                    {{ errors.first_name }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

            <div class="col-md-7">
                <input id="last_name" type="text" name="last_name" class="form-control" v-model="input.last_name" required autofocus />

                <span class="err-msg" v-if="errors.last_name">
                    {{ errors.last_name }}
                </span>
            </div>
        </div>

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
                <button type="submit" class="btn btn-primary" :disabled="disabled">
                    Register
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
                    // role_id: 1,
                    first_name: '',
                    last_name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                errors: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    password: '',
                },
                endpoints: {
                    profile: '/user/profile/?token=',
                    register: '/api/v1/auth/register'
                }
            }
        },

        methods: {
            
            async registerUser() {
                let component = this;
                
                Utils.setObjectValues(component.errors, '');

                component.disabled = true;

                await axios.post(component.endpoints.register, component.$data.input)
                    
                    .then(function(response) {
                        let data = response.data;

                        window.location.href = component.endpoints.profile + data.data.token;
                    })
                    .catch(function(error) {
                        let data = error.response.data;

                        for (let key in component.errors) {
                            component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
                        }

                        Utils.handleError(data);
                    });
                
                component.disabled = false;
            },
        }
    }
</script>