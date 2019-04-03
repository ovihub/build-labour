<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <span class="edit-icon">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">About Me</div>

            <span class="profile-label mt-2 pt-1">Gender</span>
            <span class="profile-text">
                {{ input.gender }}
            </span>

            <span class="profile-label mt-2 pt-1">Date of Birth</span>
            <span class="profile-text">
                {{ input.dob_formatted }}
            </span>

            <span class="profile-label mt-2 pt-1">Marital Status</span>
            <span class="profile-text">
                {{ input.marital_status }}
            </span>

            <span class="profile-label mt-2 pt-1">English Skill</span>
            <span class="profile-text">
                Proficient in written and spoken
            </span>

            <span class="profile-label mt-2 pt-1">Driver's License</span>
            <span class="profile-text">
                Owns valid license
            </span>
            <span class="profile-text">
                Don't own/have access to personal registered vehicle
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                input: { gender: '', dob: '', dob_formatted: '', marital_status: '' }
            }
        },

        created() {
            let component = this;

            Bus.$on('aboutMeDetails', function(details) {
                component.input = details;
            });
        },

        methods: {
            
        }
    }
</script>