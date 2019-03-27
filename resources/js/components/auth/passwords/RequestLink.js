export default {

    data() {
        return {
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
        
        sendResetPasswordLink() {
            var app = this;
            
            app.errors.email = '';

            axios.post(app.endpoints.send,
                       app.$data.input)
                 .then(function(response) {
                        let data = response.data;
                        
                        if (data.success) {
                            app.input.email = '';

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

                                Bus.$emit('alertError', data.message[0]);
                            }
                        }
                    });
        }
        
    }
}