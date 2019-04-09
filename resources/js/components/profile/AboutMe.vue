<template>
    <div class="profile-item-1">
        <div class="profile-content">
            <div class="profile-content-p20 pt-3 pb-4">
                <span class="edit-icon">
                    <img src="/img/icons/editbutton.png"
                        srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
                </span>
            
                <div class="profile-title">About Me</div>

                <span class="bl-label-15 mt-2 pt-1">Gender</span>
                <span class="bl-label-14">
                    {{ input.gender }}
                </span>

                <span class="bl-label-15 mt-2 pt-1">Date of Birth</span>
                <span class="bl-label-14">
                    {{ input.dob_formatted }}
                </span>

                <span class="bl-label-15 mt-2 pt-1">Marital Status</span>
                <span class="bl-label-14">
                    {{ input.marital_status }}
                </span>

                <span class="bl-label-15 mt-2 pt-1">English Skill</span>
                <span class="bl-label-14">
                    {{ input.english_skill }}
                </span>

                <span class="bl-label-15 mt-2 pt-1">Driver's License</span>
                <span class="bl-label-14">
                    {{ input.drivers_license }}
                </span>
                <!-- <span class="bl-label-14">
                    Don't own/have access to personal registered vehicle vehicle vehicles
                </span> -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                input: {
                    gender: '', dob: '', dob_formatted: '', marital_status: '', english_skill: '', drivers_license: ''
                }
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