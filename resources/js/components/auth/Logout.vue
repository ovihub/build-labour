<template>
    <div class="" id="navbarSupportedContent">
        <img id="navbarDropdown" class="bl-nav-profile-pic" src="/img/icons/default.png" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
            <div class="dropdown-item" v-on:click="logoutUser">
                Logout
            </div>
        </div>
    </div>
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