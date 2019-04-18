<template>
    <div class="" id="navbarSupportedContent">
        <div id="navbarDropdown" data-toggle="dropdown">
            <img v-if="input.profile_photo_url" class="bl-nav-profile-pic" :src="input.profile_photo_url" />
            <avatar cls="bl-nav-profile-pic" size="32" border="2" :is-logout=true v-else></avatar>
        </div>

        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
            <li class="dropdown-item" @click="showProfile">
                My Profile
            </li>
            <li class="dropdown-item" @click="logoutUser">
                Logout
            </li>
        </ul>
    </div>
</template>

<script>

    import Api from '@/api';

    export default {

        data() {
            return {
                input: {
                    initials: '', profile_photo_url: ''
                },
                endpoints: {
                    logout: '/api/v1/auth/logout',
                }
            }
        },

        created() {
            let component = this;

            Bus.$on('avatarDetails', function(details) {
                component.input = details;
			});
        },

        methods: {

            showProfile() {
                window.location.href = '/user/profile';
            },
            
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