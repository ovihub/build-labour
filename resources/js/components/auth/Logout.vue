<template>
    <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" v-on:click="logoutUser">
            Logout
        </a>
    </div> -->
    <a v-on:click="logoutUser">
        <img title="LOGOUT" class="profile-picture-nav" style="width:25px;height:25px;" src="/img/icons/default.png">
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
                        // let data = error.response.data;

                        Utils.handleError(error);
                    });
            }
            
        }
    }
</script>