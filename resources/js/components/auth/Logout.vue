<template>
    <a v-on:click="logoutUser">
        Logout
    </a>
</template>

<script>
    export default {

        data() {
            return {
                endpoints: {
                    logout: '/api/v1/auth/logout',
                }
            }
        },

        methods: {

            logoutUser() {
                let component = this;
                
                axios.get(component.endpoints.logout, Utils.getBearerAuth())
                
                    .then(function(response) {
                        window.location.href = '/login';
                    })
                    .catch(function(error) {
                        let data = error.response.data;

                        Utils.handleError(data);
                    });
            }
            
        }
    }
</script>