export default {

    data() {
        return {
            input: {
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
                register: '/api/v1/auth/register'
            }
        }
    },

    methods: {
        
        registerUser() {
            var app = this;
            
            app.errors.first_name = '';
            app.errors.last_name = '';
            app.errors.email = '';
            app.errors.password = '';

            axios.post(app.endpoints.register,
                       app.$data.input)
                 .then(function(response) {
                        let data = response.data;
                        
                        if (data.success) {
                            app.input.first_name = '';
                            app.input.last_name = '';
                            app.input.email = '';
                            app.input.password = '';
                            app.input.password_confirmation = '';

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
                                app.errors.first_name = data.errors.first_name ? data.errors.first_name[0] : '';
                                app.errors.last_name = data.errors.last_name ? data.errors.last_name[0] : '';
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