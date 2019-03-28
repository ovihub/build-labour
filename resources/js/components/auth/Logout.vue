<template>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" v-on:click="logoutUser">
            Logout
        </a>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                url_params: Helper.methods.getUrlParams(),
                endpoints: {
                    logout: '/api/v1/auth/logout',
                }
            }
        },

        methods: {

            logoutUser() {
                var app = this;
                
                axios.get(app.endpoints.logout,
                            {
                                headers: {
                                    "Authorization" : "Bearer " + this.url_params.token
                                }
                            })
                    .then(function(response) {
                            window.location.href = '/login';
                        })
                    .catch(function(error) {
                            console.log('Logout Error', error);
                        });
            }
            
        }
    }
</script>