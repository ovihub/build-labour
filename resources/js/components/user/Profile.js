export default {

    data() {
        return {
            url_params: Helper.methods.getUrlParams(),
            disabled: false,
            input_resend: {
                email: '',
            },
            input: {
                first_name: '',
                last_name: '',
                email: '',
                dob: '',
                country: '',
                address: '',
                mobile_number: '',
            },
            errors: {
                first_name: '',
                last_name: '',
                email: '',
                dob: '',
                country: '',
                address: '',
                mobile_number: '',
            },
            endpoints: {
                get: '/api/v1/auth/user',
                save: '/api/v1/user/update',
                resend: '/api/v1/auth/verification/resend'
            }
        }
    },

    created() {
        this.getProfile();
    },

    methods: {
        
        getProfile() {
            let component = this;

            axios.get(component.endpoints.get,
                        {
                            headers: {
                                "Authorization" : "Bearer " + this.url_params.token
                            }
                        })
                  .then(function(response) {
                            component.input = response.data.data.user;
                            component.input_resend.email = response.data.data.user.email;

                            delete component.record.date_created_at;
                            delete component.record.date_updated_at;
                            delete component.record.date_email_verified_at;
                            delete component.record.deleted_at;
                          })
                  .catch(function(error) {
                            console.log('Error', error);
                          });
        },

        resendEmail() {
            var app = this;
            
            axios.post(app.endpoints.resend,
                       app.$data.input_resend,
                       {
                            headers: {
                                "Authorization" : "Bearer " + this.url_params.token
                            }
                       })
                 .then(function(response) {
                        let data = response.data;
                        
                        if (data.success) {
                            Bus.$emit('alertSuccess', data.message);
                        }
                    })
                 .catch(function(error) {
                        let data = error.response.data;

                        if (! data.success) {
                            if (data.http_status == 500) {
                                Bus.$emit('alertError', 'An internal error occurred.');
                            
                            } else {
                                Bus.$emit('alertError', 'An error occurred.');
                            }
                        }
                    });
        },

        saveProfile() {
            let component = this;
            
            component.errors.first_name = '';
            component.errors.last_name = '';
            component.errors.email = '';
            component.errors.dob = '';
            component.errors.country = '';
            component.errors.address = '';
            component.errors.mobile_number = '';

            axios.post(component.endpoints.register,
                       component.$data.input,
                       {
                            headers: {
                                "Authorization" : "Bearer " + this.url_params.token
                            }
                       })
                 .then(function(response) {
                        let data = response.data;
                        
                        if (data.success) {
                            component.input.first_name = '';
                            component.input.last_name = '';
                            component.input.email = '';
                            component.input.dob = '';
                            component.input.country = '';
                            component.input.address = '';
                            component.input.mobile_number = '';

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
                                component.errors.first_name = data.errors.first_name ? data.errors.first_name[0] : '';
                                component.errors.last_name = data.errors.last_name ? data.errors.last_name[0] : '';
                                component.errors.email = data.errors.email ? data.errors.email[0] : '';
                                component.errors.dob = data.errors.dob ? data.errors.dob[0] : '';
                                component.errors.country = data.errors.country ? data.errors.country[0] : '';
                                component.errors.address = data.errors.address ? data.errors.address[0] : '';
                                component.errors.mobile_number = data.errors.mobile_number ? data.errors.mobile_number[0] : '';

                                Bus.$emit('alertError', 'Invalid input! Please see errors below.');
                            }
                        }
                    });
        }
        
    }
}