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