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