<template>
    <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" v-on:click="logoutUser">
            Logout
        </a>
    </div> -->
    <img title="LOGOUT" class="bl-nav-profile-pic" src="/img/icons/default.png" v-on:click="logoutUser">
</template>

<script>

    import Api from '@/api';

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

                    })
                    .catch(function(error) {

                        Utils.handleError(error);
                    })
                    .finally(function() {
                        Api.deleteToken();
                    })
            }
            
        }
    }
</script>