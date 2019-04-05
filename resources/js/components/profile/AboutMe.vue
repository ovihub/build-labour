<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <span class="edit-icon">
                <img src="/img/icons/editbutton.png"
                    srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
            </span>
            
            <div class="profile-title">About Me</div>

            <span class="bl-label-s15 mt-2 pt-1">Gender</span>
            <span class="bl-label-s14">
                {{ input.gender }}
            </span>

            <span class="bl-label-s15 mt-2 pt-1">Date of Birth</span>
            <span class="bl-label-s14">
                {{ input.dob_formatted }}
            </span>

            <span class="bl-label-s15 mt-2 pt-1">Marital Status</span>
            <span class="bl-label-s14">
                {{ input.marital_status }}
            </span>

            <span class="bl-label-s15 mt-2 pt-1">English Skill</span>
            <span class="bl-label-s14">
                Proficient in written and spoken
            </span>

            <span class="bl-label-s15 mt-2 pt-1">Driver's License</span>
            <span class="bl-label-s14">
                Owns valid license
            </span>
            <span class="bl-label-s14">
                Don't own/have access to personal registered vehicle vehicle vehicles
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