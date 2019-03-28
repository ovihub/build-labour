import Datepicker from 'vuejs-datepicker';

export default {
    data() {
        return {
            disabled_input: false,
            disabled_resend: false,
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
            },
            format: 'd MMMM yyyy',
        }
    },

    components: {
        Datepicker
    },

    created() {
        this.getProfile();
    },

    methods: {
        
        getProfile() {
            let component = this;

            axios.get(component.endpoints.get, Utils.getBearerAuth())
                
                .then(function(response) {
                    component.input = response.data.data.user;
                    component.input_resend.email = response.data.data.user.email;
                })
                .catch(function(error) {
                    let data = error.response.data;

                    Utils.handleError(data);
                });
        },

        async resendEmail() {
            let component = this;
            
            component.disabled_resend = true;

            await axios.post(component.endpoints.resend, component.$data.input_resend, Utils.getBearerAuth())

                .then(function(response) {
                    let data = response.data;
                    
                    Bus.$emit('alertSuccess', data.message);
                })
                .catch(function(error) {
                    let data = error.response.data;

                    Utils.handleError(data);
                });
            
            component.disabled_resend = false;
        },

        saveProfile() {
            // TODO: trigger save
            // let component = this;
            
            // Utils.setObjectValues(component.errors, '');

            // axios.post(component.endpoints.register, component.$data.input, Utils.getBearerAuth())

            //     .then(function(response) {
            //         let data = response.data;
                    
            //         Utils.setObjectValues(component.input, '');

            //         Bus.$emit('alertSuccess', data.message);
            //     })
            //     .catch(function(error) {
            //         let data = error.response.data;

            //         for (let key in component.errors) {
            //             component.errors[key] = data.errors[key] ? data.errors[key][0] : '';
            //         }

            //         Utils.handleError(data);
            //     });
        }
        
    }
}